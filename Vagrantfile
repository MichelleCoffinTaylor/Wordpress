Vagrant.configure("2") do |config|
  # Name of the box we have downloaded and is on the computer
  config.vm.box = "chesterwhitwell/YoobeeLAMP"
# URL/IP Address we will go to use
config.vm.network "private_network", ip: "192.168.33.10"
  # Don't need to insert a key when using the website
  config.ssh.insert_key = false
  # The www folder is where all the files will go to be hosted
  config.vm.synced_folder "www/", "/var/www/html" , create: true , owner: "www-data", group: "www-data", mount_options: ["dmode=775,fmode=664"]

end
