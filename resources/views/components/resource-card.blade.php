<a {{$attributes->merge(['class'=>'bg-gray-900 px-4 py-2 flex w-full gap-10 items-center transform transition-transform hover:scale-105 shaow-lg rounded-lg '])}} >
    <i class="fa-regular fa-file-lines text-3xl py-3 px-5 rounded-full bg-blue-700"></i>
    <div>
      {{$slot ??''}}
    </div>
</a>