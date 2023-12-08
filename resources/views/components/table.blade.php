<div class="flex justify-center">
  <div class="overflow-x-auto flex flex-col gap-5">
    <div class="flex justify-end gap-5">
      @if ($message)
        <x-flash-message type="success" :message="$message"/>
      @endif
      <x-button
      as="link"
      link="{{ route($module.'.create') }}"
      text="Add Class"
      icon="fa-solid fa-plus"
      text="Add "
      />
    </div>
    <table class="min-w-full bg-white dark:bg-gray-800  shadow-md rounded-xl">
      <thead class="mb-16">
        <tr class="bg-blue-gray-100  text-gray-700 dark:text-gray-300">
          {{$headers ?? ''}}
         
        </tr>
      </thead>
      <tbody class="text-blue-gray-900 dark:text-gray-300">
        {{$body ?? ''}}
       
      </tbody>
    </table>

{{ $paginate ?? '' }}                       
  </div>
</div>