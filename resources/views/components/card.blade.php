

<a  {{$attributes->merge(['class'=>'max-w-sm rounded bg-gray-800 overflow-hidden shadow-lg transform transition-transform hover:scale-125'])}} >
  <img class="w-full" src="/image/liquid-cheese.svg" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">
      {{ $title ??'' }}
    </div>
    <p class="text-gray-400 text-base">
      {{ $desc ?? '' }}
    </p>
  </div>
 
</a>