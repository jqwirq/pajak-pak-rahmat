<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1em;
        }
    </style>
    <title>Home</title>
</head>

<body>
    <header>
        <div class="navbar">
            <a href="/">Home</a>
            <a href="/items">Items</a>
            <a href="/salaries">Salaries</a>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Salaries Date</h1>

            <form method="POST" action="/salaries" id="formNewItem">
                @csrf
                <div class="group">
                    <label>Name</label>
                    {{-- <input type="text" name="employee_id" id="name" minlength="1" required
                        style="flex-basis:500px;flex-shrink:1;"> --}}
                    <select name="employee_id" id="name" required>
                        <option value=""> -- Select One --</option>
                        @foreach ($employees as $e)
                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="group">
                    <label>Price</label>
                    <input type="date" name="date" id="date" required>

                    <button type="submit" style="margin-left:10%">submit</button>
            </form>
        </div>
    </main>

    <script>
        console.log("hi mom!");
    </script>
</body>

</html>
