set :application, 'luckyday'
set :repo_url, 'git@github.com:guiparmezani/luckyday.git'

# Branch options
# Prompts for the branch name (defaults to current branch)
#ask :branch, -> { `git rev-parse --abbrev-ref HEAD`.chomp }

# Hardcodes branch to always be master
# This could be overridden in a stage config file
set :branch, :master

# set :deploy_to, -> { "/home1/parmezan/deploy/#{fetch(:application)}" }
set :deploy_to, -> { "/home5/luckyda4/deploy/#{fetch(:application)}" }

set :log_level, :info

# Apache users with .htaccess files:
# it needs to be added to linked_files so it persists across deploys:
# set :linked_files, %w{.env web/.htaccess}
set :linked_files, %w{.env web/.htaccess}
set :linked_dirs, %w{web/app/uploads web/app/themes/luckyday/node_modules}
# set :tmp_dir, "/home1/parmezan/capistrano_tmp"
set :tmp_dir, "/home5/luckyda4/capistrano_tmp"

set :nvm_type, :system
# set :nvm_node_path, '/home1/parmezan/.nvm/versions/node/'
set :nvm_node_path, '/home5/luckyda4/.nvm/versions/node/'
# set :nvm_path, '/home1/parmezan/.nvm/'    
set :nvm_path, '/home5/luckyda4/.nvm/'    
set :nvm_node, 'v5.0.0'
set :nvm_map_bins, %w{node npm gulp bower}
# set :nvm_custom_path, '/usr/local/nvm/versions/node'

set :nvm_prefix, "#{fetch(:nvm_path)}/nvm-exec"
set :npm_target_path, -> { release_path.join('web/app/themes/luckyday') }
set :npm_flags, '--development --no-spin --no-progress' # default
set :npm_roles, :app

set :bower_target_path, -> { release_path.join('web/app/themes/luckyday') }

set :gulp_target_path, -> { release_path.join('web/app/themes/luckyday') }
set :gulp_task, 'build'

before 'deploy:updated', 'gulp'

namespace :deploy do
  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :rm, "-r #{release_path}/web/app/cache/*"
    end
  end
end

# The above restart task is not run by default
# Uncomment the following line to run it on deploys if needed
#after 'deploy:publishing', 'deploy:restart'
SSHKit.config.command_map[:bash] = "/usr/bin/bash"
# SSHKit.config.command_map[:composer] = "/ramdisk/php/54/bin/php54-cli /home5/luckyda4/bin/composer.phar"
SSHKit.config.command_map[:composer] = "/ramdisk/php/54/bin/php54-cli /home5/luckyda4/bin/composer.phar"