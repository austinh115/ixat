from urllib import urlretrieve, urlopen
from threading import Thread, activeCount
from time import sleep
from os import remove
from json import loads

#lol = "summerflix"
lol = "earth,eglobe,enature,enight,eparty,hedgehog,hhangry,hhback,hhbomb,hhclap,hhcrying,hhfit,hhlaugh,hhshades,hhsleep,hhwink,kawaii,kwbacon,kwbowl,kwcookie,kwcup,kwcupcake,kwegg,kwjam,kwkettle,kwpopcicle,kwtoaster"

def download(sName):
	while True:
		try:
			#print "http://www.xatech.com/images/sm2/" + sName + ".swf"
			urlretrieve("http://www.xatech.com/images/sm2/" + sName + ".swf", "/root/Dropbox/zatsite/images/sm2/" + sName + ".swf")
			break
		except Exception, e:
			print e
			pass
	


try:
	i = 0
	pss = lol.split(',')
	while i < len(pss):
		while activeCount() < 100 and i < len(pss):
			if not pss[i].isdigit():
				Thread(target = download, args = [pss[i]]).start()
				print i, '/', len(pss)
			i += 1
		
		sleep(1)
except Exception, e:
	print e
