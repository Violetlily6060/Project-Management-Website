@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">

<div class="users-container">

    <div class="users-header">
        <form action="{{ route('users.index') }}" method="GET">
            <select name="role" onchange="this.form.submit()" class="users-selection">
                <option value="user" {{ request()->query('role', 'user') === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ request()->query('role', 'user') === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </form>
        <a href="{{ route('users.create') }}" class="btn-create">+ New User</a>
    </div>

    @if(session('success'))
        <div style="margin-bottom:15px; padding:10px; background:#d4edda; color:#155724; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <div class="empty">
            No {{ request()->query('role', 'user') }}s found. <a href="{{ route('users.create') }}">Create one</a>
        </div>
    @else
        <div class="users-list">
            @foreach($users as $userItem)
                <div class="user-card">

                    <div class="user-title">{{ $userItem->name }}</div>

                    <div class="user-actions">
                        @if(auth()->id() === $userItem->id || auth()->user() -> role === 'admin')
                            <a href="{{ route('users.edit', $userItem) }}" class="btn btn-edit">Edit</a>

                            <form method="POST" action="{{ route('users.destroy', $userItem) }}" style="flex:1;" onsubmit="return confirm('Delete this User?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 25px;">
            {{ $users->links() }}
        </div>

    @endif
</div>
@endsection