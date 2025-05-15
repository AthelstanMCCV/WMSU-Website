<x-head>
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<section class="h-screen bg-whitesmoke">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="../images/WMSU-Logo.png" alt="WMSU Logo">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">LOGIN TO ADMIN</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="/login" method="POST">
        @csrf
        @if ($errors->any())
          <div class="bg-red-100 text-red-800 p-2 rounded">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div>
          <label for="loginname" class="block text-sm/6 font-medium text-gray-900">Username</label>
          <div class="mt-2">
            <input type="name" name="loginname" id="name" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="loginpassword" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-red-600 hover:text-red-500">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input type="password" name="loginpassword" id="password" autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold  hover:bg-red-500 text-white shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Don't Have an Account?
        <a href="/register" class="font-semibold text-red-600 hover:text-red-800">Sign Up</a>
      </p>
    </div>
  </div>
</section>

  
</x-head>