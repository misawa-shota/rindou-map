@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <dl class="my-5 pt-5">
            <dt><h2>利用規約</h2></dt>
            <dd>
                <p>
                    この利用規約（以下，「本規約」といいます。）は，このウェブサイト上で提供するサービス（以下，「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下，「ユーザー」といいます。）には，本規約に従って，本サービスをご利用いただきます。
                </p>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第1条（適用）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本規約は，ユーザーと当社との間の本サービスの利用に関わる一切の関係に適用されるものとします。
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスに関し，本規約のほか，ご利用にあたってのルール等，各種の定め（以下，「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず，本規約の一部を構成するものとします。
                    </li>
                    <li class="list-group-item text_indent">
                        本規約の規定が前条の個別規定の規定と矛盾する場合には，個別規定において特段の定めなき限り，個別規定の規定が優先されるものとします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第2条（利用登録）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービスにおいては，登録希望者が本規約に同意の上，本サービスの定める方法によって利用登録を申請し，本サービスがこれを承認することによって，利用登録が完了するものとします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第3条（メールアドレスおよびパスワードの管理）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        ユーザーは，自己の責任において，本サービスのメールアドレスおよびパスワードを適切に管理するものとします。
                    </li>
                    <li class="list-group-item text_indent">
                        ユーザーは，いかなる場合にも，メールアドレスおよびパスワードを第三者に譲渡または貸与し，もしくは第三者と共用することはできません。当社は，メールアドレスとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのメールアドレスを登録しているユーザー自身による利用とみなします。
                    </li>
                    <li class="list-group-item text_indent">
                        メールアドレス及びパスワードが第三者によって使用されたことによって生じた損害は，本サービスに故意又は重大な過失がある場合を除き，本サービス側は一切の責任を負わないものとします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第4条（禁止事項）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        法令または公序良俗に違反する行為
                    </li>
                    <li class="list-group-item text_indent">
                        犯罪行為に関連する行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスの内容等，本サービスに含まれる著作権，商標権ほか知的財産権を侵害する行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービス，ほかのユーザー，またはその他第三者のサーバーまたはネットワークの機能を破壊したり，妨害したりする行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスによって得られた情報を商業的に利用する行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスの運営を妨害するおそれのある行為
                    </li>
                    <li class="list-group-item text_indent">
                        不正アクセスをし，またはこれを試みる行為
                    </li>
                    <li class="list-group-item text_indent">
                        他のユーザーに関する個人情報等を収集または蓄積する行為
                    </li>
                    <li class="list-group-item text_indent">
                        不正な目的を持って本サービスを利用する行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスの他のユーザーまたはその他の第三者に不利益，損害，不快感を与える行為
                    </li>
                    <li class="list-group-item text_indent">
                        他のユーザーに成りすます行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスが許諾しない本サービス上での宣伝，広告，勧誘，または営業行為
                    </li>
                    <li class="list-group-item text_indent">
                        面識のない異性との出会いを目的とした行為
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスに関連して，反社会的勢力に対して直接または間接に利益を供与する行為
                    </li>
                    <li class="list-group-item text_indent">
                        以下の表現を含み，または含むと本サービス側が判断する内容を本サービス上に投稿し，または送信する行為
                        <ol class="list-group-numbered">
                            <li class="list-group-item text_indent">
                                過度に暴力的な表現
                            </li>
                            <li class="list-group-item text_indent">
                                露骨な性的表現
                            </li>
                            <li class="list-group-item text_indent">
                                人種，国籍，信条，性別，社会的身分，門地等による差別につながる表現
                            </li>
                            <li class="list-group-item text_indent">
                                自殺，自傷行為，薬物乱用を誘引または助長する表現
                            </li>
                            <li class="list-group-item text_indent">
                                その他反社会的な内容を含み他人に不快感を与える表現
                            </li>
                        </ol>
                    </li>
                    <li class="list-group-item text_indent">
                        その他，本サービス側が不適切と判断する行為
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第5条（本サービスの提供の停止等）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービスは，以下のいずれかの事由があると判断した場合，ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。
                        <ol class="list-group-numbered">
                            <li class="list-group-item text_indent">
                                本サービスにかかるコンピュータシステムの保守点検または更新を行う場合
                            </li>
                            <li class="list-group-item text_indent">
                                地震，落雷，火災，停電または天災などの不可抗力により，本サービスの提供が困難となった場合
                            </li>
                            <li class="list-group-item text_indent">
                                コンピュータまたは通信回線等が事故により停止した場合
                            </li>
                            <li class="list-group-item text_indent">
                                その他，本サービスの提供が困難と判断した場合
                            </li>
                        </ol>
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスの提供の停止または中断により，ユーザーまたは第三者が被ったいかなる不利益または損害についても，本サービス側は一切の責任を負わないものとします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第6条（利用制限および登録抹消）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービスは，ユーザーが以下のいずれかに該当する場合には，事前の通知なく，ユーザーに対して，本サービスの全部もしくは一部の利用を制限し，またはユーザーとしての登録を抹消することができるものとします。
                        <ol class="list-group-numbered">
                            <li class="list-group-item text_indent">
                                本規約のいずれかの条項に違反した場合
                            </li>
                            <li class="list-group-item text_indent">
                                登録事項に虚偽の事実があることが判明した場合
                            </li>
                            <li class="list-group-item text_indent">
                                本サービス側からの連絡に対し，一定期間返答がない場合
                            </li>
                            <li class="list-group-item text_indent">
                                その他，本サービスの利用を適当でないと判断した場合
                            </li>
                        </ol>
                    </li>
                    <li class="list-group-item text_indent">
                        当社は，本条に基づき当社が行った行為によりユーザーに生じた損害について，一切の責任を負いません。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第7条（保証の否認および免責事項）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービスは，本サービスに事実上または法律上の瑕疵（安全性，信頼性，正確性，完全性，有効性，特定の目的への適合性，セキュリティなどに関する欠陥，エラーやバグ，権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスは，本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。ただし，本サービスに関する本サービス側とユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合，この免責規定は適用されません。
                    </li>
                    <li class="list-group-item text_indent">
                        前項ただし書に定める場合であっても，本サービス側は，本サービス側の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害のうち特別な事情から生じた損害（本サービス側またはユーザーが損害発生につき予見し，または予見し得た場合を含みます。）について一切の責任を負いません。また，本サービス側の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害の賠償は，ユーザーから当該損害が発生した月に受領した利用料の額を上限とします。
                    </li>
                    <li class="list-group-item text_indent">
                        本サービス側は，本サービスに関して，ユーザーと他のユーザーまたは第三者との間において生じた取引，連絡または紛争等について一切責任を負いません。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第8条（サービス内容の変更等）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービスは，ユーザーに通知することなく，本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし，これによってユーザーに生じた損害について一切の責任を負いません。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第9条（利用規約の変更）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービス側は，必要と判断した場合には，ユーザーに通知することなくいつでも本規約を変更することができるものとします。なお，本規約の変更後，本サービスの利用を開始した場合には，当該ユーザーは変更後の規約に同意したものとみなします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第10条（個人情報の取扱い）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本サービス側は，本サービスの利用によって取得する個人情報については，本サービスの「プライバシーポリシー」に従い適切に取り扱うものとします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第11条（通知または連絡）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        ユーザーと本サービス側との間の通知または連絡は，本サービス側の定める方法によって行うものとします。本サービス側は,ユーザーから,本サービス側が別途定める方式に従った変更届け出がない限り,現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い,これらは,発信時にユーザーへ到達したものとみなします。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第12条（権利義務の譲渡の禁止）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        ユーザーは，本サービス側の書面による事前の承諾なく，利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し，または担保に供することはできません。
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="my-5">
            <dt class="border-start border-danger border-5"><h3 class="ps-3">第13条（準拠法・裁判管轄）</h3></dt>
            <dd>
                <ol class="list-group-numbered">
                    <li class="list-group-item text_indent">
                        本規約の解釈にあたっては，日本法を準拠法とします。
                    </li>
                    <li class="list-group-item text_indent">
                        本サービスに関して紛争が生じた場合には，当方の本店所在地を管轄する裁判所を専属的合意管轄とします。
                    </li>
                </ol>
            </dd>
        </dl>
        <span>以上</span>
    </div>
@endsection
