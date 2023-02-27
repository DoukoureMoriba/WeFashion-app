<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catégorie</title>
</head>
<body>
    <form action="{{route('dashboard.categorie_add')}}" method="post">
        @csrf
        <label for="name">Nom de la Catégorie</label> <br>
        <input type="text" id="name" name="name"> <br>
        <button type="submit">Ajoutez la catégorie</button>
    </form>
</body>
</html>