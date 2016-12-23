#le fichier config contient les donnees du profil de la plante
#le fichier data contient les donnees recues par les capteurs
import urllib2, urllib, time
while 1:
	fichierdata=open('data')
	data=fichierdata.readlines()
	fichier=open('config') # il faut une config
	mydata=[('mail','client@mail.be'),('data_temp',data[0]),('data_hum',data[1]),('data_res',data[2])]    #variables du POST
	mydata=urllib.urlencode(mydata)
	path='http://vps319254.ovh.net/EasyGrowing/communicationRasp.php'    #url qui prend le POST
	req=urllib2.Request(path, mydata)
	req.add_header("Content-type", "application/x-www-form-urlencoded")
	page=urllib2.urlopen(req).read()
	if fichier.read()!=page:
		#print "Mise a jour!"
		fichier2=open('config','w') 
		fichier2.write(page)
	#print page
	time.sleep(5) #sleep bas pour les test

