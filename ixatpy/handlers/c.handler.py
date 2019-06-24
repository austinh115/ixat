def cHandler(packet, client, server):
	from xml.sax.saxutils import quoteattr
	from time import time, sleep
	from random import randint

	if client.online and not client.info['banned'] and not client.info['sinbinned'] and "t" in packet.keys():
		if packet["t"] == "/KEEPALIVE":
			return

		if client.hidden:
			client.info['KeepPool'] = True
			client.joinRoom(False, True)

		if packet["t"][0] == "/" and "u" in packet.keys():
			actionTime = ""
			actionTime2 = ""
			actionType = ""
			sameIPDetection = False
			useIp = "0.0.0.0"
			if client.info['temp'] != 0 and (client.info['temp'] - float(time())) < 0:
				return client.disconnect()
			for char in packet["t"]:
				if char != "/":
					try:
						actionTime += str(int(float(char)))
						actionTime2 += str(int(float(char)))
					except:
						actionType += char
			targetUser = server.getUserByID(packet["u"], client.info['chat'])
			if actionType[0] in ["r", "e", "m", "M"]:
				ranks = {'r': [[1, 2, 4], 5], 'e': [[1, 2, 4], 3], 'm': [[1, 4], 2], 'M': [[1], 4]}
				rank = ranks[actionType]
				try:
					targetUserRow = server.database.fetchArray("SELECT * FROM `users` WHERE id=%(id)s", {"id": packet["u"]})[0]
				except:
					return
				try:
					targetRank = int(server.database.fetchArray("SELECT * FROM `ranks` WHERE chatid=%(chatid)s and userid=%(userid)s", {"chatid": client.info["chat"], "userid": packet["u"]})[0]["f"])
				except:
					targetRank = 5
				if targetUser == False and actionType != "r":
					return
				if (client.info["rank"] in rank[0]) and server.higherRank(client.info["rank"], targetRank, True):
					import json
					ranklock = server.json_load(server.database.fetchArray("SELECT * FROM `chats` WHERE id=%(id)s", {"id":client.info["chat"]})[0]['ranklock'])
					if ranklock == None:
						ranklock = {}
					if str(targetUserRow['id']) in ranklock.keys():
						return
					#	return client.notice("You cannot change this user's rank because they are ranklocked.", True)
					server.database.query('delete from `ranks` where `userid`=%(userid)s and `chatid`=%(chatid)s', {"userid": targetUserRow["id"], "chatid": client.info["chat"]})
					server.database.query('insert into `ranks`(`userid`, `chatid`, `f`, `sinbin`) values(%(userid)s, %(chatid)s, %(f)s, 0);', {"userid": targetUserRow["id"], "chatid": client.info["chat"], "f": rank[1]})
					if not (actionType == "e" and client.info['rank'] in client.minRankToArray(client.canSilentMember_minRank) and client.hasPower(142, True)):
						client.sendRoom('<m u="' + str(client.info["id"]) + '" d="' + str(targetUserRow["id"]) + '" t="/m" p="' + str(actionType) + '" i="0" />')
					server.database.insert('messages', {'visible': '1', 'id': str(client.info['chat']), 'uid': str(client.info['id']), 'uid2': int(targetUserRow["id"]), 'message': '/m', 'reason': actionType, 'name': client.info['name'], 'registered': client.info['username'], 'avatar': client.info['avatar'], 'time': str(int(time())), 'pool': client.info["pool"], 'port': str(server.connection['port'])})
					if targetUser != False and targetUser.info["chat"] == client.info["chat"]:
						targetUser.send('<c p="' + str(actionType) + '" u="' + str(client.info["id"]) + '" t="/m" d="' + str(targetUserRow["id"]) + '" />')
						#targetUser.joinRoom(False, True, True)
						pool = targetUser.getPool(targetUser.info['pool'], True)
						targetUser.info['ChangePool'] = int(pool)
						if pool != targetUser.info['pool']:
							targetUser.sendRoom('<l u="' + str(targetUser.info['id']) + '" />')
							targetUser.joinRoom(True, False)
						else:
							targetUser.joinRoom(False, True)
			if actionType[0] == "g" and client.info["rank"] in client.minRankToArray(client.ban_minRank):
				if targetUser != False and targetUser.null == True:
					if client.info["id"] in server.config["staff"]:
						client.send('<m t="' + str(targetUser.connection['ip']) + '" u="0" />')
					return
				actionReason = str(packet["p"])
				blasttype = "blastban"
				if client.info["rank"] == 2:
					hours = float(float(actionTime) / 60 / 60)
					maxHours = client.maxBan_mod
					if maxHours != 0:
						if client.hasPower(3, True): # mod8
							maxHours += 2
						if client.hasPower(80, True): # gcontrol
							maxHours += 2
					
					if hours > maxHours:
						hours = maxHours
						
					if actionTime == "0" and maxHours != 0:
						return client.notice("You can only ban for a maximum of " + str(maxHours) + " hours. You tried banning for " + str(client.fixFloat(hours)) + " hours.")				
				elif client.info["rank"] == 4:
					hours = float(float(actionTime) / 60 / 60)
					maxHours = client.maxBan_owner
					if hours > maxHours:
						hours = maxHours
						
					if actionTime == "0" and maxHours != 0:
						return client.notice("You can only ban for a maximum of " + str(maxHours) + " hours. You tried banning for " + str(client.fixFloat(hours)) + " hours.")
				
				if "w" in packet.keys():
					actionSpecial = int(packet["w"])
				else:
					actionSpecial = 0
				try:
					targetUserRow = server.database.fetchArray("SELECT * FROM `users` WHERE id=" + str(int(packet["u"])))[0]
				except:
					return
				try:
					targetRank = int(server.database.fetchArray("SELECT * FROM `ranks` WHERE chatid=" + str(int(client.info["chat"])) + " and userid=" + str(int(packet["u"])))[0]["f"])
				except:
					targetRank = 5
				if (server.higherRank(client.info["rank"], targetRank, True) or targetRank == 1 and client.info['rank'] == 1 and actionType == "gd") and (client.info["rank"] in [1, 2, 4]):
					if client.info["Naughty"]:
						return client.send('<m t="You cannot kick/ban while naughtystepped." u="0" />')
					if actionTime == "0":
						actionTime = "315569520" # 10 years
					bannedTime = float(actionTime) + float(time())
					t = bannedTime - float(time())
					if t > 0:
						if str(actionType) == "gg": # gag
							if client.hasPower(41, True) == False:
								return
							if int(actionTime) > 3600 or int(actionTime) == 0:
								actionTime = "3600"
								actionTime2 = "3600"
								bannedTime = float(actionTime) + float(time())
							actionSpecial = 41
						elif str(actionType) == "gm": # mute
							if client.hasPower(46, True) == False:
								return
							if int(actionTime) > 3600 or int(actionTime) == 0:
								actionTime = "3600"
								actionTime2 = "3600"
								bannedTime = float(actionTime) + float(time())
								actionSpecial = 0
							try:
								server.database.query('delete from `bans` where chatid=%(chatid)s and type="g" and ip=%(ip)s', {"chatid": client.info["chat"], "ip": targetUser.connection["ip"]})
							except:
								server.database.query('delete from `bans` where chatid=%(chatid)s and type="g" and ip=%(ip)s', {"chatid": client.info["chat"], "ip": targetUserRow["connectedlast"]})
						elif str(actionType) == "gd": # dunce
							if client.hasPower(158, True) == False:
								return
							actionTime = "315569520"
							actionTime2 = "0"
							bannedTime = float(actionTime) + float(time())
							actionSpecial = 158
							blasttype = "blastdunce"
						elif str(actionType) == "gn": # naughtystep
							if client.hasPower(284, True) == False or client.info['rank'] not in client.minRankToArray(client.canNaughtyStep_minRank):
								return
							actionTime = "315569520"
							actionTime2 = "0"
							bannedTime = float(actionTime) + float(time())
							actionSpecial = 284
						elif str(actionType) == "gy": # yellowcard
							if client.hasPower(296, True) == False or client.info['rank'] not in client.minRankToArray(client.canYellowCard_minRank):
								return
							actionTime = "315569520"
							actionTime2 = "0"
							bannedTime = float(actionTime) + float(time())
							actionSpecial = 296
							blasttype = "blastyellow"
						elif str(actionType) == "gr": # redcard
							if client.hasPower(367, True) == False or client.info['rank'] not in client.minRankToArray(client.canRedCard_minRank):
								return
							actionSpecial = 367
							blasttype = "blastred"
						elif str(actionType) == "g" and int(actionSpecial) not in server.specialBans: # regular ban
							try:
								useIp = targetUser.connection["ip"]
								server.database.query('delete from `bans` where chatid=%(chatid)s and type="g" and ip=%(ip)s', {"chatid": client.info["chat"], "ip": targetUser.connection["ip"]})
							except:
								useIp = targetUserRow["connectedlast"]
								server.database.query('delete from `bans` where chatid=%(chatid)s and type="g" and ip=%(ip)s', {"chatid": client.info["chat"], "ip": targetUserRow["connectedlast"]})
							actionSpecial = 0
							sameIPDetection = True
						elif actionSpecial != 0 and int(actionSpecial) in server.specialBans:
							if int(actionSpecial) in server.specialBans:
								if int(actionSpecial) in server.gameBans:
									actionType = "g"
								#	return client.notice("GameBans are currently disabled.")
								if client.hasPower(int(actionSpecial), True) == False:
									return
								actionType = "g"
							else:
								return
						else:
							return
						unSpecial = False
						if (int(actionSpecial) != 0):
							specialBans = server.database.fetchArray("SELECT * FROM `bans` WHERE " + "chatid=%(chatid)s and userid=%(userid)s and special=%(special)s", {"chatid": client.info["chat"], "userid": packet["u"], "special": actionSpecial})
							for ban in specialBans:
								if int(ban["special"]) == actionSpecial:
									unSpecial = True
						if unSpecial == True:
							server.database.query("delete from `bans` where chatid=%(chatid)s and userid=%(userid)s and special=%(special)s", {"chatid": client.info["chat"], "userid": targetUserRow["id"], "special": actionSpecial})
							if targetUser != False:
								targetUser.joinRoom(False, True)
						elif unSpecial == False:
							server.database.insert('bans', {
								'chatid': int(client.info["chat"]),
								'userid': int(targetUserRow["id"]),
							    'unbandate': float(bannedTime),
							    'ip': str(targetUserRow["connectedlast"]),
							    'type': str(actionType),
							    'special': int(actionSpecial),
								'hours': float(int(actionTime) / 3600)
							})

							if actionType == "gr":
								actionType = "g"
							if actionType != "gm":
								server.database.insert('messages', {
									'visible': '1',
									'id': str(client.info['chat']),
									'uid': str(client.info['id']),
									'uid2': int(targetUserRow["id"]),
									'message': '/' + actionType + str(actionTime2),
									'reason': actionReason,
									'special': actionSpecial,
									'name': client.info['name'],
									'registered': client.info['username'],
									'avatar': client.info['avatar'],
									'time': str(int(time())),
									'pool': client.info["pool"],
									'port': str(server.connection['port'])
								})
							banParams = ""
							banParams += 'p=' + quoteattr(actionReason) + ' '
							if actionSpecial != 0:
								banParams += 'w="' + str(actionSpecial) + '" '
							banParams += 't="/' + actionType + str(actionTime2) + '" '
							banParams += 'u="' + str(client.info["id"]) + '" '
							banParams += 'd="' + str(targetUserRow["id"]) + '" '
							banParams += 'i="0" '

							if actionType == "gm":
								client.sendRoom('<m ' + banParams + '/>', False, targetUserRow["id"])
							else:
								client.sendRoom('<bl u="' + str(client.info["id"]) + '" d="' + str(targetUserRow["id"]) + '" t="' + blasttype + '" v="' + str(randint(0, 3))  + '" r="' + server.BlastCargo(targetRank) + '" o="' + server.BlastCor(targetRank) + '" />', False)
								client.sendRoom('<m ' + banParams + '/>', False)

								if sameIPDetection:
									for user in server.clients:
										if user.online and user.connection["ip"] == useIp and user.info["chat"] == client.info["chat"] and user.info["id"] != targetUserRow["id"]:
											user.signOut()

							if targetUser != False and targetUser.info["chat"] == client.info["chat"]:
								if actionType == "gg" or actionType == "gn":
									targetUser.disconnect()
								else:
									if actionType != "gm" and (int(actionTime) > 3600 and actionSpecial == 0 and client.Assigned(70) or actionSpecial == 0 and client.Assigned(126)):
										if client.Assigned(70) and client.Assigned(126):
											targetUser.disconnect()
										else:
											client.info["joinTime"] = float(time())
											targetUser.joinRoom(False, True, True)
									else:
										targetUser.joinRoom(False, True, True)
			if targetUser != False and targetUser.info["chat"] == client.info["chat"] and client.info["rank"] in [1, 2, 4]:
				if "u" in packet.keys():
					try:
						targetRank = int(server.database.fetchArray("SELECT * FROM `ranks` WHERE chatid=%(chatid)s and userid=%(userid)s", {"chatid": client.info["chat"], "userid": packet["u"]})[0]["f"])
					except:
						targetRank = 5
					if actionType[0] == "u" and server.higherRank(client.info["rank"], targetRank, True) and client.info["rank"] in client.minRankToArray(client.unBan_minRank):
						if targetUser != False:
							server.database.query("delete from `bans` where chatid=%(chatid)s and type=\"g\" and ip=%(ip)s or chatid=%(chatid)s and userid=%(userid)s and type=\"g\"", {"chatid": client.info["chat"], "ip": targetUser.connection["ip"], "userid": targetUser.info["id"]})
							server.database.query("delete from `bans` where chatid=%(chatid)s and type=\"gm\" and ip=%(ip)s or chatid=%(chatid)s and userid=%(userid)s and type=\"gm\"", {"chatid": client.info["chat"], "ip": targetUser.connection["ip"], "userid": targetUser.info["id"]})
							client.sendRoom('<m u="' + str(client.info["id"]) + '" d="' + str(int(packet["u"])) + '" t="/u" i="0" />', False)
							server.database.insert('messages', {'visible': '1', 'id': str(client.info['chat']), 'uid': str(client.info['id']), 'uid2': int(packet["u"]), 'message': '/u', 'name': client.info['name'], 'registered': client.info['username'], 'avatar': client.info['avatar'], 'time': str(int(time())), 'pool': client.info["pool"], 'port': str(server.connection['port'])})
							targetUser.send('<c d="' + str(targetUser.info["id"]) + '" t="/u" u="' + str(client.info["id"]) + '" />')
							pool = targetUser.getPool(0, True)
							targetUser.info['ChangePool'] = int(pool)
							targetUser.sendRoom('<l u="' + str(targetUser.info['id']) + '" />')
							if pool != targetUser.info['pool']:
								targetUser.disconnect()
							else:
								targetUser.joinRoom(False, True)
					if actionType[0] == "k" and "p" in packet.keys() and client.info["rank"] in client.minRankToArray(client.kick_minRank):
						actionReason = str(packet["p"]).split("#")
						if server.higherRank(client.info["rank"], targetUser.info["rank"], True):
							isBoot = False
							Group = ""
							if targetUser.info["rank"] in [2, 4] and client.hasPower(28, True) == False:
								return
							if client.info["Naughty"]:
								return client.send('<m t="You cannot kick/ban while naughtystepped." u="0" />')
							if len(actionReason) == 3 and actionReason[2] == "bump" and client.hasPower(121, True):
								actionReason[0] = "#".join(actionReason)
							elif len(actionReason) == 2 and client.hasPower(25, True):
								isBoot = True
								Group = actionReason[1]
								actionReason[0] = "#".join(actionReason)
							if isBoot and len(Group) > 0:
								try:
									group = server.database.fetchArray('SELECT * FROM `chats` WHERE `name` =  %(name)s', {"name": Group})[0]
									targetUser.send('<q p2=' + quoteattr(actionReason[0]) + ' u="' + str(targetUser.info['id']) + '" d2="' + str(client.info['id']) + '" r="' + str(group['id']) + '" />')
									targetUser.disconnect()
								except:
									isBoot = False
									pass
							server.database.insert('messages', {'visible': '1', 'id': str(client.info['chat']), 'uid': str(client.info['id']),  'uid2': int(targetUser.info["id"]), 'message': '/' + actionType, 'reason': actionReason[0], 'name': client.info['name'], 'registered': client.info['username'], 'avatar': client.info['avatar'], 'time': str(int(time())), 'pool': client.info["pool"], 'port': str(server.connection['port'])})
							client.sendRoom('<m p=' + quoteattr(actionReason[0]) + ' t="/' + actionType + '" u="' + str(client.info["id"]) + '" d="' + str(targetUser.info["id"]) + '" i="0" />', False)
							if not isBoot:
								server.database.insert('bans', {'chatid': int(client.info["chat"]), 'userid': int(targetUser.info['id']), 'unbandate': (time() + 15), 'ip': str(targetUser.connection["ip"]), 'type': "gg", 'special': 41})
								targetUser.send('<c p=' + quoteattr(actionReason[0]) + ' t="/' + actionType + '" u="' + str(client.info["id"]) + '" d="' + str(targetUser.info["id"]) + '" />')
								targetUser.disconnect()
