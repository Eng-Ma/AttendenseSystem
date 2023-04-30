from os import system

models = ['Course', 'Attendence', 'Section', 'UserSection','TimeDate', 'AbsenseRequest', 'Time', 'Notification',]

for model in models:
    print('Creating Model for: ',model)
    system('php artisan make:model '+model+' -a --api')
    print('Done.')