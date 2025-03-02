# ***Laravel Tutorial***

# I. Requirements

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

# II. Create new laravel project

   1. go to public folder in the server.

         like :
                - (xampp) : xampp/htdocs/
                - (wamp) : wampp64/www/

    2. create the project using Composer :

> composer create-project laravel/laravel projectName

    3. go to the project folder :

> cd <name of the project>

    4. run the project :

> php artisan serve

    5. open the project in the browser :

> localhost:8000

# III. Start Coding

## 1. Routing

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

 1. to make all the routes in the controller worked (index , create , store , show , edit , update , destroy)
  the routes will be : /news , /news/create , /news/store , /news/{id} , /news/{id}/edit , /news/{id} , /news/{id}

  ```sh

   Route::resource('news' , '\App\Http\Controllers\NewsController');

   ```

   2. you can create a resource Controller by this command :

   > php artisan create:controller --resource

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

## 2. add a middleware

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

> php artisan make:middleware <middlewareName>

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
    }) -> middleware('middlewareName');

```

   5. add a middleware in group of routes :

```sh

    Route::group(['middleware' => 'middlewareName'] , function () {
        Route::get('/' , function () {
            return view('welcome');
        });
    });

```

   6. apply the middleware to the hole controller :

     + the method __construct() is make the middeleware applied to all the methods in this controller :

```sh

    public function __construct() {
        $this->middleware('middlewareName');
    }

```

+ and to add an exception inside the controller for a method just add :

```sh

   public function __construct() {
        $this->middleware('middlwareName') ->except('methodName');
    }

```

***

## 3. Views

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

     > \resources\lang\ar\home.php

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

## 4. Login and Register

***

+ 1. ***make default login/register*** :

***

1. install packajes :

> composer require laravel/ui --dev

> npm install

2. create the vues using this command :

> php artisan ui vue --auth

3. create the deafult tables using this command :

> php artisan migrate

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

### 1. ***Regiser***
  
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

### 2. ***Login***

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

## 5. Verify the user

***

+ make the user must verify his email before login.

+ 1. ***in the route file*** :

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

## 6. task scheduling

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

> php artisan make:command <taskName>

   2. in the task file :

```sh
       
       // wrrite the name of the task and the description of the task :

    protected $signature = 'command:name';

    protected $description = 'Command description';

```

3. in the handle method :
    + example 01:

       + the task that make change in the database :

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

> php artisan schedule:run

***

+ 3. ***example of task scheduling (send notifications email to the users:)*** :

***

+ example 02:

  + the task that send an email every day:

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

> php artisan schedule:run

***

## 7. Models

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

> php artisan make:model <modelName>

***

+ 3. ***what is fillable*** :

  + it's an array that contain the columns that you can insert data in it.

    + example :

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

    + example :

```sh
            
            class User extends Model
            {

                protected $hidden = [   // the columns that you don't want to show it in the response
                    'password' ,
                    'remember_token'
                      
                ];

            }
```

## 8. Database

+ 1. ***what is migration*** :

***

    + it's a way to create a table in the database using code.

***

+ 2. ***how to make a migration*** :

***

    1. create a migration :

> php artisan make:migration <migrationName>

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

> php artisan migrate

***

+ 3. ***how to get data from the database*** :

***
    - methods :  get , all , find , where , first , select , orderBy , limit , count , max , min , avg , sum , exists , doesntExist , pluck , firstOrCreate , firstOrNew , create , update , delete , destroy , save , push , fresh , findOrFail , findOrfail , findOrNew , findMany , find , findMany , findManyOrFail , findManyOrfail , findManyOrNew , findManyOrNew , findManyOrFail , findManyOrfail .
               

   1. get all the data :

```sh

    $data = User::all();

```

   2. get specific columns :

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

+ 4. ***how to insert data in the database*** :

***

   1. insert data : (insert one row to the orders table) :
       + in the controller :

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

+ 5. ***insert data in the database using a form*** :

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
          

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order created sucssesfuly'; // to return to the form after insert the data

        
    }

```

***

+ 6. ***validate data before insert it in the database*** :

***

        1. add in the validation function in the controller :
    
```sh

            public function insert (Request $request) { // to get the data from the form
          
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

          // if the data is not valid return the error message in new page :

            if ($validator -> fails()) {
                return $validator -> errors() -> all();
            }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order created sucssesfuly'; // to return to the form after insert the data

        
```

***

+ 7. ***Show error messages in the form*** :

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

+ 8. ***Validate the data in the request*** (the best way) :

***

    1. create a request :

> php artisan make:request <requestName>

    2. in the request file :

```sh

     // put the rules of the validation :
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

      // costimize the validation messages .
    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تكون اكبر من 8 حروف',
          
        ];
    }

```

    3. in the controller file :

```sh

    public function insert (RequestName $request) { // to get the data from the form

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order created sucssesfuly'; // to return to the form after insert the data

    }

```

***

+ 9. ***Edite & update data in the database*** :

***

    1. in the view file (edit.blade.php ):

```sh

    <form method="POST" action="{{route('update' , $data->id)}}">
        @csrf
        <input type="text" name="name" value="{{$data->name}}">
        <input type="text" name="email" value="{{$data->email}}">
        <input type="text" name="password" value="{{$data->password}}">
        <button type="submit">update</button>
    </form>

```

    2. in the route file :

```sh

    Route::get('/edit/{id}' , 'App\Http\Controllers\HomeController@edit')->name('edit');
    Route::post('/update/{id}' , 'App\Http\Controllers\HomeController@update')->name('update');

```

    3. in the controller file :

```sh

    public function edit ($id) {
        $data = User::find($id);
        return view('edit' , compact('data'));
    }

    public function update (Request $request , $id) {
        $data = User::find($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order updated sucssesfuly';
    }

```

***

+ 10. ***delete data from the database*** :

***

    1. in the view file (orders.blade.php ):

```sh

    <a href="{{route('delete/'.$data->id)}}">delete</a>

```

    2. in the route file :

```sh

    Route::get('/delete/{id}' , 'App\Http\Controllers\yourController@delete')->name('delete');

```

    3. in yourcontroller file :

```sh

    public function delete ($id) {
        $data = User::find($id);

        if (!$data) {
            return 'the order not found';
        }
        
        $data->delete();
        return 'your order deleted sucssesfuly';
    }

```     


***

+ 11. ***save photo in the database*** :

***

    1. in the view file (create.blade.php ):

```sh

    <form method="POST" action="{{route('insert')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <input type="file" name="image">
        <button type="submit">insert</button>
    </form>

```

    2. in the config/filesyste.php :

+ add this line in the disks :

```sh
 
 'images' =>[
            'driver' => 'local',
            'root' => storage_path('public/images'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
            'throw' => false,
 ]

```

    3. in the controller file :

```sh

    public function insert (Request $request) {

    $file_extension = $request -> image -> getClientOriginalExtension(); 
    $file_name = time().'.'.$file_extension; 
    $path = 'images';  // the images will be saved in the public/images folder
    $request -> image -> move($path , $file_name); 

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'photo' => $file_name,
        ]);

        return 'your order created sucssesfuly';
    }

```

note :
    - the photo column in the users table must be string type.
    - don't forget to add the photo column in the fillable array in the table model.

***

## 9. multi languages

***

+ 1. ***what is multi languages*** :

***

    + it's a way to make the website in many languages.

***

+ 2.***how to make a multi languages*** :

***

    1. create a lang file :

> php artisan make:lang <langName>

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

    2. in the request file :

```sh

    public function messages()
    {
        return [
            'name.required' => __('messages.name.required'),
            'email.required' => __('messages.email.required'),
            'email.email' => __('messages.email.email'),
            'password.required' => __('messages.password.required'),
            'password.min' => __('messages.password.min'),
          
        ];
    }

```

***

4. ***change the language*** :

    + using macamara package :

   1. install the package :

> composer require mcamara/laravel-localization

+ and just complete the steps in the [Documentation](https://github.com/mcamara/laravel-localization) of the package.

   2. in the view file :

      + to show the languages :

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

5. ***get the data from database according to the language***

***
  
  1. create the database :

     + create a table (like orders) with the colomun according to the languages (like name_en , name_ar) .

  2. get the data from the database :

```sh

    $data = Order::select('name_' . LaravelLocalization::getCurrentLocale() . ' as name')->get();

```

+ (. LaravelLocalization::getCurrentLocale()) to get the current language.

    like :
         in the english language the column will be name_en
            in the arabic language the column will be name_ar

  + Note :
    + when you add a new column in the table you must add the column in the model.



## 10. Laravel Events and Listeners
***

+ 1. ***what is events and listeners*** :

***

+ it's a way to make the code more clean and easy to read.
    + like :
        - when the user register send an email to him.
        - when the user make an order send a notification to the admin.
        - when the user make a payment send a notification to the user.
        - when the user see a product increase the views of the product.


***

+ 2. ***how to make an event*** :

***

    1. create an event :

> php artisan make:event <eventName>

    2. in the event file :

```sh

    // add the data that you want to send it to the listener :

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

```

    3. in the controller file :

```sh

    event(new EventName($data));

```

***

+ 3. ***how to make a listener*** :

***

    1. create a listener :

> php artisan make:listener <listenerName> --event=<eventName>


    2. in the listener file :

```sh

    // add the event that you want to listen to :

    public function handle(EventName $event)
    {
        // the code that you want to run when the event run.
    }

```

    3. add the listener and the event in the event service provider :


```sh

    protected $listen = [
        EventName::class => [
            ListenerName::class,
        ],
    ];

```


## 11. Ajax 

***

1. ***what is ajax*** :

***

+ it's a way to send a request to the server without refresh the page.


***

2. ***how to make an ajax request*** :

***

    1. in the view file :

```sh

    <form id="form">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <button type="submit">insert</button>
    </form>

    <script>
        $('#form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{route('insert')}}',
                data: $('#form').serialize(),
                success: function (data) {
                    console.log(data);
                }
            });
        });
    </script>

```

    2. in the route file :

```sh

    Route::post('/insert' , 'App\Http\Controllers\HomeController@insert')->name('insert');

```

    3. in the controller file :

```sh

    public function insert (Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'your order created sucssesfuly';
    }

```

***

3. ***delete data using ajax*** :

***

    1. in the view file :

```sh

    <div class="d-flex justify-content-start gap-5">
     @foreach($products as $product)
         <div class="card p-2 Card{{$product->id}}" style="width: 20rem; height: 20rem ">
             <br>
             <div class="card-body">
               <h5 class="card-title">{{$product->name}}</h5>
               <p class="card-text">{{$product->description}}</p>
               <p class="card-price text-info">{{$product->price}} DZ</p>
                 <a class="rounded bg-danger text-bg-primary p-1" product_id="{{$product->id}}" id="delete_btn" class="btn btn-primary delete_btn">delete</a>
             </div>
           </div>
         @endforeach

        </div>

        // the ajax code :

    <script>
     $(document).on('click', '#delete_btn', function(e){
        e.preventDefault();
        console.log('delete');
        var product_id = $(this).attr('product_id');
        $.ajax({
            type: "POST",
            url: "{{route('product.delete')}}",
            data: {
                product_id: product_id,
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                if(response.status == true){
                    alert(response.message);
                    $('.Card'+product_id).remove(); // to remove the product from the view
                }else{
                    alert(response.message);
                }
            }
        });
    });

    </script>

```

    2. in the route file :

```sh

    Route::post('/product/delete' , 'App\Http\Controllers\HomeController@delete')->name('product.delete');

```

    3. in the controller file :

```sh

    public function delete (Request $request) {
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(
                [
                    'status' => false ,
                     'message' => 'the product not found'
                     ]
            );
        }
        $product->delete();
        return response()->json(
            [
                'status' => true ,
                 'message' => 'the product deleted sucssesfuly' ,
                  'product_id' => $request->product_id, // to remove the product from the view
                  ]
            );
    }

```

***

## 12. Multi guards

***

+ 1. ***what is multi guards*** :

***

+ it's a way to make diffrent persone login with different profile.
    + like :
        - login as normal user with the email and the password.
        - login as admin with the username and the password.


***

+ 2. ***how to make a multi guards authification*** :

***

    1. in the config/auth.php :

```sh

    'guards' => [
        'web' => [  // the default guard for the normal user
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [  // the guard for the admin
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // the model of the normal user
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // the model of the admin
        ],
    ],

```

    2. in the route file :

```sh

  Route::get('site' , 'App\Http\Controllers\Auth\CustomAthificationController@user') -> middleware('auth:web');
Route::get('admin' , 'App\Http\Controllers\Auth\CustomAthificationController@admin') -> middleware('auth:admin') -> name('admin');

Route::get('admin/login' , 'App\Http\Controllers\Auth\CustomAthificationController@adminLogin');
Route::post('admin/login' , 'App\Http\Controllers\Auth\CustomAthificationController@CheckAdminLogin') -> name('admin.login');

```

 
  3. in the controller file :

```sh


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CustomAthificationController extends Controller
{

  public function user(){
        return view('customAuth.user');
    }

    public function admin(){
        return view('customAuth.admin');
    }

    public function adminLogin(){
        return view('customAuth.login');
    }

    public function CheckAdminLogin(Request $request){
        // $this->validate($request , [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        if(Auth::guard('admin')->attempt(['email' => $request -> email, 'password' => $request -> password])){
            return redirect() -> intended('/admin');
        }
        return back() -> withInput($request -> only('email'));
       
    }

}

```

4. in the view file :

```sh

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('auth.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.email') }}/{{__('auth.mobile')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('auth.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('auth.forgot_your_password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

```

***

## 13. Laravel Relationships

***

+ 1. ***what is relationships*** :

***

+ it's a way to make a relation between the tables in the database.
    + like :
        - one to one.
        - one to many.
        - many to many.
        - has many through.
        - has one through.
        - polymorphic relations.
        - many to many polymorphic relations.

        



    


