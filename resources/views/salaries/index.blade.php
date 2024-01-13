<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #525252;
            padding: 0.15em 0.4em;
        }
    </style>
    <title>Home</title>
</head>

<body>
    {{-- @dd($salaries) --}}
    <header>
        <div class="navbar">
            <a href="/">Home</a>
            <a href="/items">Items</a>
            <a href="/salaries">Salaries</a>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Salaries</h1>
            <div style="display:flex;justify-content:end;margin-bottom:8px; ">
                <a href="/salaries/input" style="background-color:#525252;color:white;padding:4px 8px;border-radius:8px">+ New Item</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($salaries as $s)
                        <tr>
                            <td>{{ $s->employee->name }}</td>
                            <td style="text-align:right">{{ $s->date }}</td>
                            <td style="text-align:center">
                                <form action="/salaries/{{ $s->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        style="padding:2px 4px;border:none;background-color:#525252;color:white">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </main>
</body>

</html>
