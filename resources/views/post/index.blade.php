@extends('layouts.app')

@section('content')

    {{-- CRIAR POST --}}
    @auth
        <div class="card">
            <form method="POST" action="/posts">
                @csrf
                <div class="create-post">
                    <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    <div style="flex:1;display:flex;flex-direction:column;gap:12px;">
                        <textarea name="conteudo" rows="2" placeholder="No que você está pensando?"
                            class="create-input"></textarea>
                        <div style="display:flex;justify-content:flex-end;border-top:1px solid #f3f4f6;padding-top:10px;">
                            <button type="submit" class="post-btn">Postar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endauth

    {{-- FEED --}}
    @forelse($posts as $postagem)
        <div class="card">

            {{-- Header --}}
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                @if($postagem->user->profile && $postagem->user->profile->foto)
                    <img src="{{ $postagem->user->profile->foto }}"
                        style="width:36px;height:36px;border-radius:50%;object-fit:cover;flex-shrink:0;"
                        alt="{{ $postagem->user->name }}">
                @else
                    <div class="avatar">{{ strtoupper(substr($postagem->user->name, 0, 2)) }}</div>
                @endif

                <div style="display:flex;flex-direction:column;line-height:1.3;">
                    <a href="{{ route('profile.show', $postagem->user->id) }}"
                        style="font-size:0.875rem;font-weight:600;color:#111827;text-decoration:none;">
                        {{ $postagem->user->name }}
                    </a>
                    <span style="font-size:0.75rem;color:#9ca3af;">
                        @if($postagem->user->profile)
                            @.{{ $postagem->user->name }} ·
                        @endif
                        {{ $postagem->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>

            {{-- Conteúdo --}}
            <p style="font-size:0.875rem;color:#374151;line-height:1.6;margin:0 0 12px;">
                {{ $postagem->post }}
            </p>

            {{-- Ações --}}
            <div style="display:flex;gap:4px;border-top:1px solid #f3f4f6;padding-top:10px;">
                <button class="action-btn like">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                    Curtir
                </button>

                <button class="action-btn comment">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                    Comentar
                </button>

                <button class="action-btn">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="18" cy="5" r="3" />
                        <circle cx="6" cy="12" r="3" />
                        <circle cx="18" cy="19" r="3" />
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" />
                    </svg>
                    Compartilhar
                </button>
            </div>
        </div>

    @empty
        <div style="text-align:center;padding:4rem 0;color:#9ca3af;font-size:0.875rem;">
            Nenhum post ainda. Seja o primeiro!
        </div>
    @endforelse

@endsection