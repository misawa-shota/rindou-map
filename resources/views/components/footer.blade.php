<div class="d-flex justify-content-center">
    <footer class="bg-black position-absolute bottom-0 w-100">
        <div class="container py-5">
            <ul class="col-8 mx-auto d-flex align-items-center justify-content-between list-unstyled">
                <li><a href="{{ route('maps.index') }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-secondary">マップで検索</a></li>
                <li><span class="text-secondary">|</span></li>
                <li><a href="{{ route('rindous.index') }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-secondary">一覧で検索</a></li>
                <li><span class="text-secondary">|</span></li>
                <li><a href="{{ route('rule.index') }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-secondary">利用規約</a></li>
                <li><span class="text-secondary">|</span></li>
                <li><a href="{{ route('privacy.index') }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-secondary">プライバシーポリシー</a></li>
            </ul>
            <div class="d-flex justify-content-center mt-5">
                <div>
                    <span class="me-1 text-secondary">&copy;</span><span class="fw-bold text-secondary">林道マップ</span>
                </div>
            </div>
        </div>
    </footer>
</div>
