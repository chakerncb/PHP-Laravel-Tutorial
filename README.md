#  ***Laravel Tutorial***

# I. Requirements :

1. ***Composer*** : 

   + to install the laravel project.

2. ***PHP*** :

   + to run the laravel project.

3. ***Server*** :

    + to run the project.
       -like : xampp , wamp .

4. ***Text Editor*** :

    + to write the code.
        -like : VS code , phpStorm.

6. ***Database*** :

    + to store the data.
        -like : MySQL .

7. ***Node.js*** :

    + to run the npm commands.


# II. Create new laravel project :

   1. go to public folder in the server.

         like :
                - (xampp) : xampp/htdocs/
                - (wamp) : wampp64/www/

    2. create the project using Composer :

> composer create project laravel laravel <name of the project>

    3. go to the project folder :

> cd <name of the project>

    4. run the project :

> php artisan serve

    5. open the project in the browser :

> localhost:8000


# III. Start Coding :

## 1. Routing :

+ 1. ***what is route*** :
***
   + it's a way to make the user access the page by the url

***
   + 2. ***make Simple Route*** :
***
   1. in the route file :
```sh
     Route::get('/' , function () {
          return view('welcome');
     });
```

```sh
     Route::get ('/test1' , function () {
         return ('this is algeria');
     });
```

   2. in the view file :
    
```sh
      <a href="/test1">click here</a>
```

    
***
   + 3. ***Route with calling a controller*** :
***

   1. in the route file :

```sh
      Route::get('/test2' ,'TestController@test');
```

   2. in the controller file :

```sh
      public function test() {
          return view('app');
      }
```
***
   + 4. ***Route with parameters*** :
***

         1. required parameters :

```sh
     Route::get('/test4/{id}' , function ($id){

    return ('this is algeria with id : ' . $id);
  });
```
     
            2. optional parameters :

```sh
      Route::get('/test5/{id?}' , function ($id = null){
  
      return ('this is algeria with id : ' . $id);

  }); 
```
***
  + 5. ***Route with name*** :
*** 
1. the first way :

   + in the route file :

```sh
      Route::get('/test6' , function () {
          return ('this is algeria') ;
      }) -> name('algeria');
```

   + in the view file :

```sh
      <a href="{{route('algeria')}}">click here</a>
```

***
  + 6. ***Route with prefix*** :
***
1. the first way :

```sh
  Route::prefix('admin')->group( function() {

      //the route will be : /admin/

    Route::get('/' , function (){
        return ('this is admin panel');
    });


    //the route will be : /admin/users

    Route::get('/users' , function (){
        return ('this is admin panel users');
    });

});

```

2. the second way :

```sh
  Route::group( ['prefix' => 'admin1'], function (){

    //the route will be : /admin/
    Route::get('/' , function (){
        return ('this is admin panel {2nd way}');
    });

    //the route will be : /admin/users
    Route::get('/users' , function (){
        return ('this is admin panel users {2nd way}');
    });


  });

```

***
  + 7. ***resource route*** :
***

 1.  to make all the routes in the controller worked (index , create , store , show , edit , update , destroy) 
  the routes will be : /news , /news/create , /news/store , /news/{id} , /news/{id}/edit , /news/{id} , /news/{id}

  ```sh

   Route::resource('news' , '\App\Http\Controllers\NewsController');

   ```

   2. you can create a resource Controller by this command :

   >   php artisan create:controller --resource


***
  + 8. ***New Route file*** :
***  
   + to make the routes in new file like (admin.php) worked you should add this line in RouteServiceProvider.php :

```sh

 protected $namespace = 'App\Http\Controllers';

  Or :
  (the best way) you can add this two lines in RouteServiceProvider.php :

        Route::namespace('App\Http\Controllers')
             ->group(base_path('routes/admin.php'));

```

***
## 2. add a middleware :

+ 1. ***what is middleware*** :
***

   + it's a code that run before the route to check if the user can access this route or not.
       + like : 
            -auth : to check if the user is logged in or not.
            -verified : to check if the user is verified or not.
            -admin : to check if the user is admin or not.
            -guest : to check if the user is guest or not.
            -can : to check if the user can do this action or not.
            -throttle : to check if the user make many requests in a short time or not. 

+ 2. ***how to make a middleware*** :
***

   1. create the middleware :


>    php artisan make:middleware <middlewareName>


   3. add the middleware in the kernel.php :

```sh

    protected $routeMiddleware = [
        'middlewareName' => \App\Http\Middleware\middlewareName::class,
    ];

```

   4. add a middleware in  route :

```sh 
  
    Route::get('/' , function () {
        return view('welcome');
    }) -> middleware('auth');

```

   5. add a middleware in group of routes :
    
```sh

    Route::group(['middleware' => 'auth'] , function () {
        Route::get('/' , function () {
            return view('welcome');
        });
    });

```

   6. apply the middleware to the hole controller :

     + the method __construct() is make the middeleware applied to all the methods in this controller :

```sh

    public function __construct() {
        $this->middleware('auth');
    }

```

   + and to add an exception inside the controller for a method just add :

```sh

   public function __construct() {
        $this->middleware('auth') ->except('showUsers');
    }

```

***
##  3. Views :


***
+ 1. ***to Show data in the view you must put it between*** :
***

```sh
<p> {{$data}} </p>
```

***
+ 2. ***to send data to the view*** :
***
   1. in the route :

```sh

    // 1 value :

  Route::get('/' , function () {
       return view('welcome')-> with('name of the variable' , the value);
 });

     //many values :

 Route::get('/' , function () {
   return view('welcome')-> with(['var1' => value  , 'var2' => value2 , 'var3' => value3 ]);

     //send object :

    Route::get('/' , function () {  
        $data = [];
        $data->name = 'value';
        $data->age = 20;
        return view('welcome' , compact('data'));
    });

```

   2. in the view :

```sh

    // 1 value :

    <p> {{$name of the variable}} </p>

    // many values :

    <p> {{$var1}} </p>
    <p> {{$var2}} </p>
    <p> {{$var3}} </p>

    // send object :

    <p> {{$data->name}} </p>
    <p> {{$data->age}} </p>

   ```
***
+ 3. ***call files in the view*** :
***
   + to call a files from the public folder like css, js file in the blade file you must do it like this :

 ```sh             
             href="{{URL::asset('css/style.css')}}"
 ```

***
+ 4. ***view inheritens*** :
***
  + like when you wana to use one navbar and footer for many pages this is how : 


1. use ( @yield - @extends - @section ) :

    + 1st page (the page that contain the nav and footer) :

```sh
      //   navbar


       @yield('content')
     
       //  footer

```
 
  + 2nd page (pages that contain the main content) :
                  
```sh
        @extends('nav-foot-page-name')

      @section('content')

          // the main content

                @stop

```

2. use ( @include )     -- whe you wana ad just a part to all pages like navbar :


***
+ 5. ***views languages*** :
***
   + to make sentece or a word in the view multi language you can use this :

1. in the view :

```sh
    {{__('messages.welcome')}}

```

2. in the lang file :

+ example path of arabic lang file :

     >  \resources\lang\ar\home.php

```sh

    return [
        'welcome' => 'اهلا بك',
    ];

```

***
+ 6. ***conditions in the view*** :
***

  1. ***if condition*** :

```sh

    @if($data == 'value')
        <p>the value is value</p>
    @else
        <p>the value is not value</p>
    @endif

```

  2. ***switch condition*** :
  
```sh
  
      @switch($data)
          @case('value1')
              <p>the value is value1</p>
              @break
  
          @case('value2')
              <p>the value is value2</p>
              @break
  
          @default
              <p>the value is not value1 or value2</p>
      @endswitch
  
```
  
  3. ***for loop*** :
  
```sh
  
      @for($i = 0 ; $i < 10 ; $i++)
          <p>{{$i}}</p>
      @endfor
  
```
  
  4. ***foreach loop*** :
  
```sh
  
      @foreach($data as $value)
          <p>{{$value}}</p>
      @endforeach
```
  
  5. ***while loop*** :
  
```sh
  
      @while($data < 10)
          <p>{{$data}}</p>
      @endwhile

```
  
***
## 4. Login and Register :

***
+ 1. ***make default login/register*** :
***

1. install packajes :

>    composer require laravel/ui --dev   

>    npm install

2. create the vues using this command :

>    php artisan ui vue --auth


3. create the deafult tables using this command :

>    php artisan migrate	

***
+ 3. ***what is csrf*** :
***

  + it's a token that laravel generate to protect the form from the cross site request forgery must be added to the form :

  + to add it to the form :

```sh

   <form method="POST" action="{{ route('register') }}">
        @csrf
    </form>

```
***
+ 4. ***to make the login and register with the mobile number*** :
***

 
###  1. ***Regiser*** :
  
   + 1. in the register.blade.php add this :

```sh
         <div class="row mb-3">
               <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('mobile') }}</label>

            <div class="col-md-6">
                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                @error('mobile')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                @enderror
            </div>
          </div>

```


   + 2. create the mobile field in the users table :

```sh

    $table->string('mobile')->unique();

```
  
   + 3. add the mobile field in the User model :

```sh

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
    ];

```

   + 4. in the registerController.php :
  
      // 1. add the mobile field in the validation method :

```sh 
   protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'min:10', 'max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

```

      // 2. add the mobile field in the create method :

```sh

  protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }

```

   


 ### 2. ***Login*** :

  + 1. in the login.blade.php add this:

```sh

          <div class="row mb-3">
            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('auth.mobile') }}</label>

         <div class="col-md-6">
                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

              @error('mobile')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

```

   + 2. create the mobile field in the users table :

```sh

    $table->string('mobile')->unique();

```

   + 3. add the mobile field in the User model :

```sh
          protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
    ];

```

  + 4. in the *vendor\laravel\ui\auth-backend\AuthenticatesUsers.php* that trait that contain the login function :

   + to make the login just with the mobile number:

```sh

    public function username()
    {
        return 'mobile';
    }

```

***
+ 5. ***to make the login and register with the email Or the mobile number*** :
***

    + 1. in the login.blade.php add this:
    
```sh
    
                                    <div class="row mb-3">
                            <label for="identity" class="col-md-4 col-form-label text-md-end">{{ __('auth.email') }}/{{__('auth.mobile')}}</label>

                            <div class="col-md-6">
                                <input id="identity" type="identity" class="form-control @error('email') is-invalid @enderror" name="identity" value="{{ old('identity') }}"  required autocomplete="identity" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

```

    + 2. in the loginController.php :

```sh

    public function username()
    {
        $login = request()->input('identity');  // get the value of the input with the name identity

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile'; // check if the value is email or mobile

        request()->merge([$field => $login]); // merge the value with the field

        return $field; // return the field
    }

```

***
## 5. Verify the user :
***

  + make the user must verify his email before login.

+ 1. *** in the route file*** :

```sh
      // add the verify middleware to the route :
    Auth::routes(['verify' => true]);
      
      // add the verify middleware to the route :
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

```

+ 2. ***in the user model*** :

```sh
      // add the mustVerifyEmail interface to the user model class :

    use Illuminate\Contracts\Auth\MustVerifyEmail;

    class User extends Authenticatable implements MustVerifyEmail
    {
        // the user model code
    }

```

***
## 6. task scheduling :

+ 1. ***what is task scheduling*** :
***

  + it's a way to make the laravel run a task in a specific time.
     like :
        - send an email every day at 8:00 am.
        - delete the data every week.
        - send a notification every month.

***
+ 2. ***how to make a task scheduling*** :
***

    1. create a task :

>    php artisan make:command <taskName>

   2. in the task file :

```sh
       
       // wrrite the name of the task and the description of the task :

    protected $signature = 'command:name';

    protected $description = 'Command description';

```

3. in the handle method :
    + example 01:
    
       - the task that make change in the database :
    
    ```sh
        
        // get all the users and update the name of them :
              
        public function handle()
        {
            $users = User::all();

            foreach ($users as $user) {
                $user->update(['name' => 'new name']);
            }
        }

    ```

    4. add the task to the kernel.php :

```sh

    protected $commands = [
        Commands\commandName::class,
    ];

```

    5. add the task to the schedule method in the kernel.php :

```sh

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:name')->daily(); // the task will run daily
    }

```

    6. run the task :

>    php artisan schedule:run

***
+ 3. ***example of task scheduling (send notifications email to the users:)*** :
***

   + example 02:
    
       - the task that send an email every day:
    
```sh
        
        // send an email to all the users :
              
        public function handle()
        {
            $emails = User::pluck('email')->toArray();
        $data = ['title' => 'Cource Notification', 'body' => 'please check your inbox for more details'];

        foreach ($emails as $email){
            // how to send email in laravel
            Mail::to($emails)->send(new NotifyEmail($data));

        }
        }

    ```

    4. add the task to the kernel.php :

```sh

    protected $commands = [
        Commands\commandName::class,
    ];

```

    5. add the task to the schedule method in the kernel.php :

```sh

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:name')->daily; // the task will run daily
    }

```

    6. run the task :

>    php artisan schedule:run


***
## 7. Models :

+ 1. ***what is model*** 
***

  + it's a class that represent the table in the database.
         - like :
            - User model represent the users table.
            - Post model represent the posts table.
            - Category model represent the categories table.

```sh
        Note : 
         - the model name must be same as the table name but in singular form and the first letter must be capital.

             - like :
              ---------------------------
              | table name | model name |                               
              ---------------------------
              | users      | User       |
              | posts      | Post       |
              | categories | Category   |
              ---------------------------

             - and if you want to make a model with a different name you must add this line in the model class :

                protected $table = 'table name';
        
        example :
        class Order extends Model
        {
            protected $table = 'myorders';
        }
```	

***
+ 2. ***how to make a model*** :
***

    1. create a model :

>    php artisan make:model <modelName>

***
+ 3. ***what is fillable*** :

    + it's an array that contain the columns that you can insert data in it.
    
       - example :

    ```sh
            
            class User extends Model
            {

                protected $fillable = [   // the columns that you can insert data in it
                    'name' ,
                    'email' ,
                    'password'
                      
                ];


            }
    ```

***
+ 4. ***what is hidden*** :

    + it's an array that contain the columns that you don't want to show it in the response.
    
       - example :

```sh
            
            class User extends Model
            {

                protected $hidden = [   // the columns that you don't want to show it in the response
                    'password' ,
                    'remember_token'
                      
                ];

            }
```

***
+ 5. ***how to get data from the database*** :
***
    - methods :  get , all , find , where , first , select , orderBy , limit , count , max , min , avg , sum , exists , doesntExist , pluck , firstOrCreate , firstOrNew , create , update , delete , destroy , save , push , fresh , findOrFail , findOrfail , findOrNew , findMany , find , findMany , findManyOrFail , findManyOrfail , findManyOrNew , findManyOrNew , findManyOrFail , findManyOrfail .
               

   1. get all the data :

```sh

    $data = User::all();

```

   2.  get specific columns :

```sh

    $data = User::select('name' , 'id')->get();

```


  3. get the first row :
    
```sh
    
     $data = User::first();
    
```
    
   4. get the first row that match the condition :
     
```sh
    
     $data = User::where('id' , 1)->first();
    
```

***
+ 6. ***how to insert data in the database*** :
***

   1. insert data : (insert one row to the orders table) : 
       - in the controller :


```sh
use App\Models\Order;


    public function insert () {
        
    Order::create([
            'id' => 1,
            'name' => 'Order 1',
            'category' => 'app',
            'description' => 'Description 1',
        ]);

    }

```

***
## 8. Database :

+ 1. ***what is migration*** :
***

    + it's a way to create a table in the database using code.

***

+ 2. ***how to make a migration*** :
***

    1. create a migration :

>    php artisan make:migration <migrationName>

    2. in the migration file :

```sh

    // example of migration file :

    public function up()
    {
        Schema::create('table name', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
        });
    }

```

    3. run the migration :

>    php artisan migrate


***
+ 3. ***insert data in the database using a form*** :
***

    1. in the view file (create.blade.php ):

```sh

    <form method="POST" action="{{route('insert')}}">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <button type="submit">insert</button>
    </form>

```

    2. in the route file :

```sh
      //call the create method that return the view file (the form) :
    Route::get('/create' , 'App\Http\Controllers\HomeController@create')->name('create');
          
        //call the insert method that insert the data in the database :
    Route::post('/insert' , 'App\Http\Controllers\HomeController@insert')->name('insert');

```

    3. in the controller file :

```sh
      // the create method that return the view file (the form) :
    public function create () {
        return view('create');
    }
              
        // the insert method that insert the data in the database :
        
    public function insert (Request $request) { // to get the data from the form
          
          // validate the data before insert it in the database :

          $validator = Validate::make($request -> all() , [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',

          ]);

          // if the data is not valid return the error message in new page :

            if ($validator -> fails()) {
                return $validator -> errors() -> first();
            }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order created sucssesfuly'; // to return to the form after insert the data

        
    }

```

***
+ 4. ***Costimize the validation messages*** :
***
    
        1. add in the validation function in the controller :
    
```sh
          $messages = [
                         // costimize the validation messages (on arabic) :
                'name.required' => 'الاسم مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.email' => 'البريد الالكتروني غير صحيح',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.min' => 'كلمة المرور يجب ان تكون اكبر من 8 حروف',
              
            ];

              
            $validator = Validate::make($request -> all() , [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
    
            ] , $messages); );
``` 
            

***
+ 5. ***Show error messages in the form*** :
***

    1. in the view file (orders.blade.php ):

```sh

    @if(Session::has('success'))  // the Session::has('success') to check if the success message is exist or not.
        <p>{{Session::get('success')}}</p> // to get the success message from the controller and show it.
    @endif
    

    <form method="POST" action="{{route('insert')}}">
        @csrf
        <input type="text" name="name">
        // to show the error message :
        @erorr('name')
            <small>{{$message}}</small>
        @enderror

        <input type="text" name="email">
        //  to show the error message :
        @erorr('email')
            <small>{{$message}}</small>
        @enderror

        <input type="text" name="password">
        //  to show the error message :
        @erorr('password')
            <small>{{$message}}</small>
        @enderror

        <button type="submit">insert</button>
    </form>

```

    2. in the controller file :

```sh
     
     $messages = [
                         // costimize the validation messages (on arabic) :
                'name.required' => 'الاسم مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.email' => 'البريد الالكتروني غير صحيح',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.min' => 'كلمة المرور يجب ان تكون اكبر من 8 حروف',
              
            ];

              
            $validator = Validate::make($request -> all() , [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
    
            ] , $messages); );

            if ($validator -> fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request -> all());
            }


            App\Models\Order::create([
                'name' => $request -> name,
                'category' => $request -> category,
                'description' => $request -> description,
    ]);

    return redirect()->back()->with('success', 'تم اضافة الطلب بنجاح');  // to show the success message

```


***
+ 6. ***update data in the database using a form*** :
***






***
## 9. multi languages :
***

+ 1. ***what is multi languages*** :
***

    + it's a way to make the website in many languages.

***
+ 2. ***how to make a multi languages*** :
***

    1. create a lang file :

>    php artisan make:lang <langName>
    
        2. in the lang file :
    
    ```sh
    
        return [
            'welcome' => 'اهلا بك',
        ];
    
    ```
    
        3. in the view file :
    
    ```sh
    
        {{__('langName.welcome')}}
    
    ```

***
3. ***make validation messages multi lang*** :
***

    1. in the lang file :

```sh

    return [
        'name.required' => 'الاسم مطلوب',
        'email.required' => 'البريد الالكتروني مطلوب',
        'email.email' => 'البريد الالكتروني غير صحيح',
        'password.required' => 'كلمة المرور مطلوبة',
        'password.min' => 'كلمة المرور يجب ان تكون اكبر من 8 حروف',
      
    ];

```

    2. in the controller file :

```sh

    $messages = [
        'name.required' => __('langName.name.required'),
        'email.required' => __('langName.email.required'),
        'email.email' => __('langName.email.email'),
        'password.required' => __('langName.password.required'),
        'password.min' => __('langName.password.min'),
      
    ];

      
    $validator = Validate::make($request -> all() , [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',

    ] , $messages); );

```

***
4. ***change the language*** :

    - using macamara package :

   1. install the package :

>    composer require mcamara/laravel-localization

   - and just complete the steps in the [Documentation](https://github.com/mcamara/laravel-localization) of the package.


   2. in the view file :

      - to show the languages :

```sh
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>

```     


  3. in the route file :

```sh

    Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

         // all your routes


    });

``` 

***

 




    
            

   


