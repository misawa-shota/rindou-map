<p align="center"><a href="" target="_blank" style="font-size: 5rem; color: black; text-decoration: none;"><img src="storage/app/public/img/icon.svg" width="70" alt="林道マップのロゴ">林道マップ</a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## アプリケーション概要

マップ上で林道の位置とルートを確認できる林道検索に特化したアプリケーションです。

![林道マップ](storage/app/public/img/bb46aca167ccec2badcc950f2ba9875f.jpg)



#### このアプリケーションでできること
- マップ上で林道の位置とルートを確認できる。
- 林道名を入力してマップ上で林道の位置を検索することができる。
- 都道府県ごとに林道を確認することができる。
- ユーザー登録すると写真や呟きを投稿することができる。
- ユーザー登録すると走行した林道を登録することができる。


## 利用方法

#### 「ユーザー登録する前」
「マップで検索」と「一覧で検索」の機能が利用できます。
「マップで検索」では、マーカーを選択するとルートを確認することができ、ポップアップに表示されている林道名のリンクを選択するとその林道の詳細ページに遷移します。また、検索フォームに林道名を入力することで入力した林道の位置とルートを確認できます。
「一覧で検索」では、都道府県を選択することでその都道府県に属する林道を一覧で確認することができます。各林道の詳細ページでは、その林道のマップ上の位置と情報、その林道に関係するユーザーの投稿を閲覧するとこができます。

#### 「ユーザー登録してログインした後」
「マイページ」から投稿を作成したり、「走行済みの林道」を登録することができます。


## このアプリを作成した理由

現在、林道に特化したマップ上で林道の位置を調べることができるようなサービスはなく、個人ブログに掲載された情報などを頼りに調べるしかないため、林道に興味はありつつも訪れることができていない人たちが多いのではないかと感じていました。そのため、マップ上で林道の位置を確認することができるサービスを提供できれば、林道に興味があるより多くの人たちが林道を訪れることができるようになるのではないかと考え、このアプリを作成しました。

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
