<!-- component -->
<aside class="flex flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
    <a href="#" class="flex items-center flex-col gap-2 justify-center my-4">
      <i class="fa-solid fa-book-open-reader text-4xl text-center text-gray-200"></i>
      <h1 class="text-gray-100 font-bold text-2xl">E-Learning</h1>
    </a>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6 ">
          @if(Auth::user()->role =='admin')
            <div class="space-y-3 ">
              <label class="text-gray-200 font-semibold"> Data Master </label>
                <a class="flex items-center px-3 py-2  {{Route::current()->getName()=='dashboard' &&'bg-blue-500'}}  text-gray-600 transition-colors  duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="/dasboard">
                <i class="fa-solid fa-table-columns"></i>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors  duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 {{Route::current()->getName()=="admin.class.index" ? 'bg-blue-500':''}}" href="{{route('admin.class.index')}}">
                    <i class="fa-solid fa-chalkboard"></i>
                    <span class="mx-2 text-sm font-medium">Class Management</span>
                </a>
                 <a class="flex items-center px-3 py-2 text-gray-600 transition-colors  duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 {{Route::current()->getName()=="admin.user.index" ? 'bg-blue-500':''}}" href="{{route('admin.user.index')}}">
                    <i class="fa-solid fa-users"></i>
                    <span class="mx-2 text-sm font-medium">User Management</span>
                </a>
                  <a class="flex items-center px-3 py-2 text-gray-600 transition-colors  duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700  {{Route::current()->getName()=="admin.course.index" ? 'bg-blue-500':''}}" href="{{route('admin.course.index')}}">
                    <i class="fa-solid fa-book"></i>
                    <span class="mx-2 text-sm font-medium">Course Management</span>
                </a>
                @elseif(Auth::user()->role =='teacher' || Auth::user()->role =='student')
                     <a class="flex items-center px-3 py-2 text-gray-600 transition-colors  duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700  {{Route::current()->getName()=="admin.course.index" ? 'bg-blue-500':''}}" href="{{route('course.index')}}">
                    <i class="fa-solid fa-book"></i>
                    <span class="mx-2 text-sm font-medium">Course</span>
                </a>
                            @endif
            
        </nav>
    </div>
</aside>