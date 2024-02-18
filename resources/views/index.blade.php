<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP TASK</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gradient-to-r from-purple-400 to-pink-500 min-h-screen flex items-center justify-center p-5">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 w-2/5">
        <h1 class="text-3xl font-bold mb-8 text-center">Leave a Message</h1>

        <form class="mb-8" method="POST" action="{{ route('messages.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="px-4 py-2 w-full bg-gray-100 focus:bg-white focus:outline-none focus:ring focus:ring-purple-500 rounded-md @error('name') border border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                    <p class="mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="px-4 py-2 w-full bg-gray-100 focus:bg-white focus:outline-none focus:ring focus:ring-purple-500 rounded-md @error('email') border border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                    <p class="mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <textarea name="message" id="message" placeholder="Message..." rows="4"
                    class="mt-4 w-full px-4 py-2 bg-gray-100 focus:bg-white focus:outline-none focus:ring focus:ring-purple-500 rounded-md @error('message') border border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-1 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="mt-4 py-2 px-4 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-md">Submit</button>
        </form>

        <table class="table-auto w-full text-left border-collapse border-gray-200">
            <thead>
                <tr class="bg-purple-600 text-white">
                    <th class="py-4 px-6 font-bold">Name</th>
                    <th class="py-4 px-6 font-bold">Email</th>
                    <th class="py-4 px-6 font-bold">Message</th>
                    <th class="py-4 px-6 font-bold">Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr>
                    <td class="py-2 px-6 border-b border-gray-300">{{ $message->name }}</td>
                    <td class="py-2 px-6 border-b border-gray-300">{{ $message->email }}</td>
                    <td class="py-2 px-6 border-b border-gray-300">{{ $message->message }}</td>
                    <td class="py-2 px-6 border-b border-gray-300">{{ $message->created_at }}</td>
                </tr>
                @empty
                <tr>
                    <td class="py-4 px-6 border-b border-gray-300 text-center" colspan="4">No messages found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</body>

</html>