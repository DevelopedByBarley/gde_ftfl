<header class="bg-surface-primary  pt-6 pb-3">
    <div class="container-fluid mb-3">
        <div class="mb-npx">
            <div class="row align-items-center g-3">
                <div class="col-sm-6 col-12">
                    <h1 class="h2 mb-0 ls-tight pr-font text-5xl"><?= $title ?? 'Nincs cím megadva' ?></h1>
                    <p class="text-lg">Üdv, <strong class="pr-font"><?= session('admin')->email ?? session('user')->email ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</header>
