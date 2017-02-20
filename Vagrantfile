Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.55"
    # config.vm.network "public_network", ip: "10.0.0.20"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    config.vm.provision "shell", inline: <<-SHELL
	    rm -rf /var/www/public
	    sudo sed -i s,/var/www/public,/var/www,g /etc/apache2/sites-available/000-default.conf
	    sudo sed -i s,/var/www/public,/var/www,g /etc/apache2/sites-available/scotchbox.local.conf
	    sudo service apache2 restart
	SHELL


    
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

end