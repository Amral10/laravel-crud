<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postly</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f9fafb;
            margin: 0;
            color: #111827;
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
            max-width: 960px;
            margin: 0 auto;
        }

        /* Sidebar */
        aside {
            width: 220px;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.5rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 2px;
            border-right: 1px solid #e5e7eb;
            background: #fff;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: -0.5px;
            color: #4f46e5;
            padding: 0 0.75rem;
            margin-bottom: 1.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .nav-item:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .nav-item.active {
            background: #eef2ff;
            color: #4338ca;
        }

        .nav-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f3f4f6;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
        }

        .avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e0e7ff;
            color: #4338ca;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 8px 12px;
            border-radius: 12px;
            font-size: 0.875rem;
            color: #9ca3af;
            background: none;
            border: none;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            font-family: inherit;
        }

        .logout-btn:hover {
            background: #fff1f2;
            color: #ef4444;
        }

        .logout-btn svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        /* Main */
        main {
            flex: 1;
            padding: 1.5rem;
        }

        /* Cards */
        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 1rem 1.25rem;
            margin-bottom: 12px;
        }

        /* Avatar */
        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e0e7ff;
            color: #4338ca;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            flex-shrink: 0;
        }

        /* Post actions */
        .action-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #6b7280;
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s, color 0.15s;
        }

        .action-btn:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .action-btn svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .action-btn.like:hover {
            background: #fff1f2;
            color: #ef4444;
        }

        .action-btn.comment:hover {
            background: #eef2ff;
            color: #4338ca;
        }

        /* Create post */
        .create-post {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .create-input {
            flex: 1;
            border: none;
            outline: none;
            resize: none;
            font-size: 0.875rem;
            font-family: inherit;
            color: #374151;
            background: transparent;
        }

        .post-btn {
            background: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }

        .post-btn:hover {
            background: #4338ca;
        }
    </style>
</head>

<body>

    <div class="app-layout">

        {{-- SIDEBAR --}}
        <aside>
            <div class="logo">Postly</div>

            <a href="/" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Feed
            </a>

            <a href="#" class="nav-item">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                Explorar
            </a>

            <a href="#" class="nav-item">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                Notificações
            </a>

            @auth
                <a href="/profile" class="nav-item {{ request()->is('profile*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Perfil
                </a>

                <div class="sidebar-bottom">
                    <div class="user-info">
                        <div class="avatar-sm">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                        <div style="display:flex;flex-direction:column;min-width:0;flex:1;">
                            <span
                                style="font-size:0.8rem;font-weight:500;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ auth()->user()->name }}</span>
                            <span style="font-size:0.7rem;color:#9ca3af;">@ {{ auth()->user()->profile->username ?? ''
                                        }}</span>
                        </div>
                    </div>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                            Sair
                        </button>
                    </form>
                </div>
            @endauth
        </aside>

        {{-- CONTEÚDO PRINCIPAL --}}
        <main>
            @yield('content')
        </main>

    </div>

</body>

</html>