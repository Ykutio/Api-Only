This simple RestApi works that:

1.First step:

    git clone https://github.com/Ykutio/Api-Only.git
    
2.Second step:

    run install : composer install
    
3.Third step:

    create ".env" file from ".env.example" file
    
4.Fourth step:

    php artisan key:generate
    
5.Fifth step:

    add params to ".env"
    
        DB_CONNECTION=mysql
        DB_HOST='MySQL-8.2'
        DB_PORT=3306
        DB_DATABASE=apionly
        DB_USERNAME=root
        DB_PASSWORD= 
        
6.Sixth step:

    php artisan migrate
    php artisan db:seed
    
7.Seventh step:

    url:
    https://apionly.local/api/{item}/list
        , here 'item' can be:
                products,
                brands,
                categories,
                countries
                
,also You can use this uri with some different parameters:
    per_page (how much 'items' to display on each page) = min:1|max:100
    offset (which entry in the database to start with) = min:0
    sort_field (what field in the database is sorted by) = id, name, price, quantity
    sort_direction = asc|desc
    
You can use uri showing concrete item:

    url:
    https://apionly.local/api/{item}/{id}/show
        , here id - is item id in database


    IMPORTANT !!!
    
 To use this api You must add in to the end of uri this parameter(api_token):
 
    ?=api_token=aergFkjh87o8agjrk_jul$kjlkjVl45
    
        for example:
        
 https://apionly.local/api/products/list?api_token=aergFkjh87o8agjrk_jul$kjlkjVl45
 https://apionly.local/api/products/2/show?api_token=aergFkjh87o8agjrk_jul$kjlkjVl45
