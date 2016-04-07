# ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

VAGRANTFILE_API_VERSION = "2"

CURRENT_DIR = Dir.pwd

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # config.vm.box = 'vinik/ubuntu'

  config.vm.define "db" do |db|
    db.vm.provider "docker" do |docker|
      docker.name = "sprint_db"
      docker.image = "mysql"
      docker.remains_running = true
      docker.ports = [ "3306:3306" ]
      docker.expose = [ 3306 ]
      docker.env = {
        "MYSQL_ROOT_PASSWORD" => "changeme"
      }
      docker.cmd = ["mysqld"]
    end

    db.vm.provider "virtualbox" do |virtualbox|
      virtualbox.name = "sprint_db"
      virtualbox.memory = 512
      config.vm.synced_folder CURRENT_DIR, "/workspace"
    end

    db.vm.provision "shell", inline: "echo hello"
  end


  config.vm.define "web" do |web|
    web.vm.provider "docker" do |docker|
      docker.name = "sprint_web"
      docker.build_dir = "."
      docker.ports = [ "80:80" ]
      docker.privileged = true
      docker.link 'sprint_db:sprint_db'
      docker.volumes = [
        CURRENT_DIR + ":/var/www/html",
        "/tmp" + ":/var/www/html/app/tmp"
      ]
      docker.env = {
        'OPENSHIFT_MYSQL_DB_HOST' => 'sprint_db',
        'OPENSHIFT_MYSQL_DB_PORT' => 3306,
        'OPENSHIFT_MYSQL_DB_USERNAME' => 'root',
        'OPENSHIFT_MYSQL_DB_PASSWORD' => 'changeme',
        'OPENSHIFT_GEAR_NAME' => 'sprint'
      }
    end

    web.vm.provider "virtualbox" do |virtualbox|
      virtualbox.name = "sprint_web"
      virtualbox.memory = 512
      config.vm.synced_folder CURRENT_DIR, "/workspace"
    end

    web.vm.provision "shell", inline: "echo 'foo'"

    

  end

end
