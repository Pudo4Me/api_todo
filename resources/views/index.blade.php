<button onclick="window.location.href='http://localhost/tasks';">
    Get all tasks
</button>

<br>
<br>

<form action="/check" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
    {{ csrf_field() }}
    <div class="col-span-9">
        <input class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg" type="text"
               name="id" placeholder="Find task (write ID)">
    </div>
    <div class="col-span-3 flex items-center">
        <button
            class="w-full py-2 bg-blue-4100 text-white rounded-md font-medium hover:bg-sky-500  hover:cursor-pointer flex justify-center"
            type="submit" name="submit">
            <span>find</span>
        </button>
    </div>
</form>

<form action="/create" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
    {{ csrf_field() }}
    <div class="col-span-9">
        <input class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg" type="text"
               name="text" placeholder="Enter new task (write text)">
    </div>
    <div class="col-span-3 flex items-center">
        <button
            class="w-full py-2 bg-blue-400 text-white rounded-md font-medium hover:bg-sky-500  hover:cursor-pointer flex justify-center"
            type="submit" name="submit">
            <span>add</span>
        </button>
    </div>
</form>

<form action="/delete" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
    {{ csrf_field() }}
    <div class="col-span-9">
        <input class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg" type="text"
               name="id" placeholder="Delete task (write id)">
    </div>
    <div class="col-span-3 flex items-center">
        <button
            class="w-full py-2 bg-blue-400 text-white rounded-md font-medium hover:bg-sky-500  hover:cursor-pointer flex justify-center"
            type="submit" name="submit">
            <span>del</span>
        </button>
    </div>
</form>
