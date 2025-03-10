

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('') }}">
        @csrf
        <label for="">titre </label>
        <input type="text" name="titre" required >
        <label for="">description </label>
        <input type="text" name="description" required >
        <label for="">Category</label>


        @foreach ($category as $item)
        <select name="" id="">
            
            <option value="{{ $item->name }}"></option>
        </select>
        @endforeach

        <button type="submit">Save</button>
    </form>
</body>
</html>