<!-- resources/views/intranet/users.blade.php -->
<h1>Liste des utilisateurs</h1>
<ul>
    @foreach($users as $user)
        <li>{{ $user->name }} - {{ $user->email }}</li>
    @endforeach
</ul>
