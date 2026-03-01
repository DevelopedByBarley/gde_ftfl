<?php if (!session('admin')) {
    return null;
} ?>

<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light border-bottom border-bottom-lg-0 border-end-lg"
    id="navbarVertical">
    <div class="container">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- User menu (mobile) -->
        <div class="navbar-user d-lg-none">
            <!-- Dropdown -->
            <div class="dropdown">
                <!-- Toggle -->
                <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="d-xl-none">
                    <div class="avatar-parent-child text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <span class="avatar-child avatar-badge bg-success"></span>
                    </div>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                    <a href="/admins/edit/<?= session('admin')->id ?>"" class="dropdown-item">
                        <div class="dropdown-header">
                            <strong><?= htmlspecialchars($_SESSION['admin']->name) ?></strong>
                            <div class="text-muted">
                                <?= htmlspecialchars($_SESSION['admin']->email) ?>
                            </div>
                        </div>
                    </a>

                    <a class="dropdown-item" href="/admin/activities">
                        <i class="bi bi-list-check me-2"></i> Tevékenységnapló
                    </a>
                    <a class="dropdown-item" href="/admins">
                        <i class="bi bi-people me-2"></i> Adminok kezelése
                    </a>
                    <hr>
                    <form action="/admin/logout" method="POST">
                        <?= csrf() ?>
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Kijelentkezés
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navigation -->

            <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link rounded <?= urlIs('/admin/dashboard') ? 'bg-indigo-500 text-white' : '' ?>"
                            href="/admin/dashboard">
                            <i class="bi bi-house"></i>
                            Kezdőlap
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded <?= urlIs('/admin/subscribers') ? 'bg-indigo-500 text-white' : '' ?>"
                            href="/admin/subscribers">
                            <i class="bi bi-people"></i>
                            Feliratkozók
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded <?= urlIs('/admin/abstracts') ? 'bg-indigo-500 text-white' : '' ?>"
                            href="/admin/abstracts">
                            <i class="bi bi-file-earmark-text"></i>
                            Absztraktok
                        </a>
                    </li>
                </ul>

                <div class="position-relative">
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="d-none d-xl-block">
                        <div class="avatar-parent-child text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute left-0" aria-labelledby="sidebarAvatar">
                        <a href="/admins/edit/<?= session('admin')->id ?>"" class="dropdown-item">
                            <div class="dropdown-header">
                                <strong><?= htmlspecialchars($_SESSION['admin']->name) ?></strong>
                                <div class="text-muted">
                                    <?= htmlspecialchars($_SESSION['admin']->email) ?>
                                </div>
                            </div>
                        </a>

                        <form action="/admin/logout" method="POST">
                            <?= csrf() ?>
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i> Kijelentkezés
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</nav>
