def hHandler(packet, client, server):
	him = server.getUserByID(int(packet['u']), int(packet['c']))
	them = server.getUserByID(int(packet['d']), int(packet['c']))
	him.sendRoom('<a u="' + str(packet['u']) + '" k="' + str(packet['k']) + '" t="' + str(packet['w']) + '" b="' + str(packet['d']) + '" />', False)
	return
	if(client.online is False and him != False and him.online and not him.null and them != False and them.online and not them.null):
		import base64
		usf = base64.b64encode('Gifts' + (str(packet['d']) + str(packet['u']) + str(packet['w'])).encode("utf-8")).decode("utf-8")
		hashs = server.phash("sha1", usf)
		if(True or packet['key'] == hashs):
			client.sendRoom('<a u="' + str(packet['u']) + '" k="' + str(packet['k']) + '" t="' + str(packet['w']) + '" b="' + str(packet['d']) + '" />', False)
			them.joinRoom(False, True)