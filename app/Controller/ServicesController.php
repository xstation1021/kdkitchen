<?php
App::uses ( 'AppController', 'Controller' );
class ServicesController extends AppController {
    var $uses = array (
            'Content' 
    );

    function kdkservice($page = null) {
        $this->layout = 'responsive';
        if (empty ( $page ) || $page == 'index') {
            $this->render ( 'index' );
        } else {
            $pages = array (
                    'kdktraining',
                    'kdkskype',
                    'kdkprivate',
                    'special',
                    'kdknewyork'
            );
            if (! in_array ( $page, $pages )) {
                throw new Exception ();
            }
            $secion_1 = array ();
            if ($page == 'kdkskype') {
                $secion_1 ["session_sub_title"] = 'KDダイエットコーチMARI & シェフによる5日間のセッション';
            } 
            else {
                $secion_1 ["session_sub_title"] = 'KDダイエットコーチMARI & シェフによる2日間のセッション';
            }
            
            $contents = $this->getCommonContents ();
            if ($page == 'kdktraining') {// kdktraining
                $contents = $this->getKDKTrainingContents ( $contents );
            }
            else if ($page == 'kdkskype') {
                $contents = $this->getKDKSkypeContents ( $contents );
            }
            else if ($page == 'kdknewyork') {	// kdknewyork 
                $contents = $this->getKDKNewYorkContents ( $contents );
            }
            else if ($page == 'kdkprivate') {	// kdkprivate
                $contents = $this->getKDKNewYorkContents ( $contents );
            }
            else if ($page == 'special') {
                $contents = $this->getKDKSpecialContents ( $contents );
            }
            
            $this->set ( 'page', $page );
            $this->set ( 'contents', $contents );
            $this->set ( 'section_1', $secion_1 );
            
            $this->render ( 'kdkservice' );
        }
    }
    function kdkplus() {
        $this->layout = 'responsive';
        $keys = array (
                'kdk_plus_price_basic',
                'kdk_plus_price_first',
                'kdk_plus_price_first_remarks',
                'kdk_plus_price_four_months',
                'kdk_plus_price_four_months_remarks',
                'kdk_plus_price_six_months',
                'kdk_plus_price_six_months_remarks',
                'kdk_plus_price_six_months_discounts',
                'kdk_plus_price_twelve_months',
                'kdk_plus_price_twelve_months_remarks',
                'kdk_plus_price_twelve_months_discounts',
                'kdk_plus_price_reciple_only',
                'kdk_plus_price_reciple_only_remarks',
                'kdk_plus_upgrade_price' 
        );
        $data = $this->__getContents ( $keys );
        $this->set ( 'content', $data );
    }
    private function getCommonContents() {
        $contents = array ();
        $contents ['program_sub_title_black'] = "＜ライフスタイルチェンジプログラムに含まれる内容＞";
        $contents ['program_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_program_pgm.png',
                'paragraphs' => array (
                        '<span class="description_normal">フードダイアリーレビュー</span>',
                        '<span class="description_normal">週1回の課題</span><span class="description_small">／合計5回</span>' 
                ) 
        );
        $contents ['program_details'] = array ();
        $contents ['program_details'] ['title'] = 'ライフスタイルチェンジプログラム';
        $contents ['program_details'] ['type'] = '1line';
        $contents ['program_details'] ['content'] [] = array (
                'detail_content_orange' => 'フードダイアリーレビュー',
                'detail_content_black' => 'ダイエットコーチによるレビュー。（土日、祝日を除く）' 
        );
        $contents ['program_details'] ['content'] [] = array (
                'detail_content_orange' => '週1回の課題',
                'detail_content_black' => '宿題はメールにて。食に関するVideo鑑賞、感想提出、クラス開催に向けての準備等。' 
        );
        
        $contents ['mission_sub_title'] = "＜テスト＞　インストラクターとしての知識が身についていることを確認";
        $contents ['mission_descriptions'] = array ();
        $contents ['mission_sub_description'] = "KD KITCHENのテストは、合格だけを目的とするものではありません。 資格取得講座や30日間のプログラム中に学ぶことは、将来インストラクターになった時に生徒さんに伝える大切なものです。　
学んだことがしっかり身についているかをテストで確認します。";
        $contents ['mission_sub_title_black'] = "＜合格ライン＞";
        $contents ['mission_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_mission_spt.png',
                'paragraphs' => array (
                        '<span class="description_normal">90％以上の正解率で合格</span>' 
                ) 
        );
        
        $contents ['mission_sub_title2'] = "＜課題＞　KD KITCHENクラスを開催する";
        $contents ['mission_descriptions2'] = array ();
        $contents ['mission_sub_description2'] = "実際に初めてのクラスを開催するのは勇気がいることです。K D
KITCHENはインストラクターとして輝いて欲しいという願いを込めた
プロジェクトですので、皆さんが最初のクラスをスムーズに開催できる
ようしっかりサポートをします。 <br>※KD KITCHEN インストラクターとして自分のクラスを開催することが
目的ですので、初回はお友達や家族対象で構いません。";
        $contents ['mission_sub_title_black2'] = "＜サポート内容＞";
        $contents ['mission_descriptions2'] [] = array (
                'image' => 'kdktraining/KDK_mission_spt2.png',
                'paragraphs' => array (
                        '<span class="description_normal">各種開設や設定におけるアドバイス</span>',
                        '<span class="description_normal">その他</span><span class="description_small">（テキストブック、レシピ、ディプロマなど）</span>' 
                ) 
        );
        
        $contents ['mission_details'] = array ();
        $contents ['mission_details'] ['title'] = 'サポート内容';
        $contents ['mission_details'] ['type'] = '2lines';
        $contents ['mission_details'] ['content'] [] = array (
                'detail_content_orange' => '各種開設や設定におけるアドバイス',
                'detail_content_black' => 'ブログ開設、スケジュール設定、クラスで使用するレシピ設定等のアドバイスを行います。' 
        );
        $contents ['mission_details'] ['content'] [] = array (
                'detail_content_orange' => 'その他含まれるもの',
                'detail_content_black' => '■テキストブック ■レシピ×11 ■ディプロマ（資格取得証明書） ■毎月お届けするニュースレター ※Health Tip等をご紹介しています。
■KD KITCHEN PLUS　※月会費￥4,800(税別)、任意　※KD KITCHEN PLUSには各種イベントご招待や割引、毎月New Yorkから新しいレシピ×3、レシピビデオ×3をお届けする等、様々な特典をご用意しています。' 
        );
        
        return $contents;
    }
    
    
    private function getKDKSkypeContents($contents) {
        $contents ['page_summary'] = '
数時間ずつ学べるのが特徴。<br>
NY からスカイプでセッションいたします。';
        $contents['top_sub_title'] = 'KDKスカイプトレーニング';
        $contents ['session_sub_title'] = "KDダイエットコーチ MARIによる6週間のセッション";
        $contents ['session_descriptions'] = array ();
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_fromNY.png',
                'paragraphs' => array (
                        '<span class="description_normal">New York からのセッション</span>',
                        '<span class="description_small">／ 各２時間・６週間のセッション：コーチ MARI</span>' 
                ) 
        );
        
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_whatsskype.png',
                'paragraphs' => array (
                        '<span class="description_normal">スカイプとは？</span><img style="position:relative;top:-3px;"src="/img/kdservice/kdktraining/KDK_session_skype_logo.png" alt="">',
                        '<span class="description_small">スカイプとは電話やテレビ電話などといったことができる<br>
無料のアプリです。こちらを使ってセッションを行います。</span>' 
                ) 
        );
        
        $contents ['session_details'] = array ();
        $contents ['session_details'] ['title'] = '講座詳細';
        $contents ['session_details'] ['type'] = '2items';
        $contents ['session_details'] ['content'] [] = array (
                'black_title' => '１名から７名までご参加いただけます。',
                'detail_content' => '１名から７名までご参加いただけるインターネット（スカイプ）を使ったセッショ
ン。NYにいるコーチMARIがスカイプで６週間にわたりセッションを行います。' 
        );
        $contents ['session_details'] ['content'] [] = array (
                'black_title' => 'スカイプとは？',
                'detail_content' => 'スカイプとは電話やテレビ電話などができる無料のアプリです。もちろんダウ
ンロードも無料です。カメラ&マイク内蔵のパソコンがあれば誰でもできる便
利なものです。KDKではこのアプリを使ってセッションを行います。
<br><span style="color:#ffbf00;">※カメラ&amp;マイク内蔵パソコンが必要です。携帯等のモバイル端末でセッションはできません。</span>' 
        );
        
        $contents ['program_sub_title'] = "Karada Detox 30日間 Healthy is Sexy<br>ライフスタイルチェンジプログラム";
        $contents ['program_sub_description'] = "６週間のセッション受講中、各自30日間のKDプログラムを実践して頂
きます。KDが最も伝えたいNew York 流のライフスタイルを実際に体験
することで、KD & KD KITHCENの効果、楽しさ、意味を、体とマイン
ドでしっかり学んで頂けます。";
        
        $keys = array (
                'kdk_skype_price',
                'kdk_skype_price_per',
                'kdk_skype_num_people',
                'kdk_skype_schedule',
                'kdk_skype_place',
                'kdk_skype_required_items'
        );
        $data = $this->__getContents ( $keys );
        $contents['service_price'] = $data['kdk_skype_price'] ;
        $contents['service_price_per'] = $data['kdk_skype_price_per'] ;
        $contents['service_num_people'] = $data['kdk_skype_num_people'] ;
        $contents['service_schedule'] = $data['kdk_skype_schedule'] ;
        $contents['service_place'] = $data['kdk_skype_place'] ;
        $contents['service_required_items'] = $data['kdk_skype_required_items'] ;
        
        
        $contents['price_summary_warning'] = array();
        $contents['price_summary_warning']['required_items'] = array('index' => 1, 'value' => 'KDKスターターキット: ¥33,400(税別)　•ジューサー　•エプロン　•パンフレットx200');
        
        return $contents;
    }
    
    // KDK Instructor training
//     private function getKDKTrainingContents($contents) {
//         $contents['top_sub_title'] = 'KDKトレーニング';
//         $contents ['page_summary'] = '東京と大阪で各3人以上のお申し込みがあった場合、<br>KDコーチMARIが、NYから来日して開催致します。';
//         $contents ['session_pic_text'] = '<span class="thin" style="font-size:50px;">COACH:</span><span class="black" style="font-size:50px;">MARI</span>';
//         $contents ['session_sub_title'] = "KDダイエットコーチ MARIによる2日間のセッション";
//         $contents ['session_descriptions'] = array ();
//         $contents ['session_descriptions'] [] = array (
//                 'image' => 'kdktraining/KDK_session_DAY1.png',
//                 'paragraphs' => array (
//                         '<span class="description_normal">Karada Detox講座</span>',
//                         '<span class="description_normal">KD KITCHEN講座</span>' 
//                 ) 
//         );
        
//         $contents ['session_descriptions'] [] = array (
//                 'image' => 'kdktraining/KDK_session_DAY2.png',
//                 'paragraphs' => array (
//                         '<span class="description_normal">KD KITCHEN講座</span>',
//                         '<span class="description_normal">クッキング講座</span>',
//                 ) 
//         );
        
//         $contents ['session_details'] = array ();
//         $contents ['session_details'] ['title'] = '講座詳細';
//         $contents ['session_details'] ['type'] = '4items';
//         $contents ['session_details'] ['content'] [] = array (
//                 'orange_title' => 'DAY1.',
//                 'black_title' => 'Karada Detox講座',
//                 'detail_content' => 'KDの概念 ー 体の中からキレイになる方法やマインド、ライフスタイル定着への重要性' 
//         );
//         $contents ['session_details'] ['content'] [] = array (
//                 'orange_title' => 'DAY1.',
//                 'black_title' => 'KD KITCHEN講座',
//                 'detail_content' => 'KD KITCHENの概念。クラスの運営方法やテクニックについて。Q&A' 
//         );
//         $contents ['session_details'] ['content'] [] = array (
//                 'orange_title' => 'DAY2.',
//                 'black_title' => 'KD KITCHEN講座',
//                 'detail_content' => 'KD KITCHENの概念。クラスの運営方法やテクニックについて。Q&A' 
//         );
//         $contents ['session_details'] ['content'] [] = array (
//                 'orange_title' => 'DAY2.',
//                 'black_title' => 'クッキング講座',
//                 'detail_content' => 'クリーンフードの基本レシピを実践を交えながら学びます。Q&A' 
//         );
        
//         $contents ['program_sub_title'] = "Karada Detox 30日間 Healthy is Sexy<br>ライフスタイルチェンジプログラム";
//         $contents ['program_sub_description'] = "3日目からは、各自30日間のKDプログラムを実践して頂きます。KDが
// 最も伝えたいNew York 流のライフスタイルを実際に体験することで、
// KD & KD KITHCENの効果、楽しさ、意味を、体とマインドでしっかり
// 学んで頂けます。";
        
//         $contents['price_summary_warning'] = array();
//         $contents['price_summary_warning'][] = array('key' => 'schedule', 'index' => 1, 'value' => '場所、時間は決まり次第発表します。');
//         $contents['price_summary_warning'][] = array('key' => 'required_item', 'index' => 2, 'value' => 'KDKスターターキット: ¥33,400(税別)　•ジューサー　•エプロン　•パンフレットx200');
        
//         $keys = array (
//                 'kdk_training_price',
//                 'kdk_training_price_per',
//                 'kdk_training_num_people',
//                 'kdk_training_schedule',
//                 'kdk_training_place',
//                 'kdk_training_required_items'
//         );
//         $data = $this->__getContents ( $keys );
//         $contents['service_price'] = $data['kdk_training_price'] ;
//         $contents['service_price_per'] = $data['kdk_training_price_per'] ;
//         $contents['service_num_people'] = $data['kdk_training_num_people'] ;
//         $contents['service_schedule'] = $data['kdk_training_schedule'] ;
//         $contents['service_place'] = $data['kdk_training_place'] ;
//         $contents['service_required_items'] = $data['kdk_training_required_items'] ;
        
//         $contents['price_summary_warning'] = array();
//         $contents['price_summary_warning']['required_items'] = array('index' => 1, 'value' => 'KDKスターターキット: ¥33,400(税別)　•ジューサー　•エプロン　•パンフレットx200');
        
//         return $contents;
//     }
    private function getKDKNewYorkContents($contents) {
        $contents['top_sub_title'] = 'KDK トレーニング';
        $contents['extra_title'] = "New York　Winter 2016";
        $contents ['page_summary'] = '2/19, 20, 21/2016';
        $contents ['session_sub_title'] = "KDダイエットコーチ MARIによる3日間のセッション";
        $contents ['session_descriptions'] = array ();
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_DAY1.png',
                'paragraphs' => array (
                        '<span class="description_normal">Karada Detox講座</span>',
                        '<span class="description_normal">KD KITCHEN講座</span>' 
                ) 
        );
        
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_DAY2.png',
                'paragraphs' => array (
                        '<span class="description_normal">KDショッピングツアー</span>',
                        '<span class="description_normal">KD KITCHEN講座</span>' 
                ) 
        );
        
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_DAY3.png',
                'paragraphs' => array (
                        '<span class="description_normal">クッキング講座</span>',
                        '<span class="description_normal">Q&A</span>' 
                ) 
        );
        
        $contents ['session_details'] = array ();
        $contents ['session_details'] ['title'] = '講座詳細';
        $contents ['session_details'] ['type'] = '4items';
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => '',
                'black_title' => 'デトックス講座',
                'detail_content' => 'KDの概念 ー 体の中からキレイになる方法やマインド、ライフスタイル定着への重要性' 
        );
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => '',
                'black_title' => 'KD KITCHEN講座',
                'detail_content' => 'KD KITCHENの概念。クラスの運営方法やテクニックについて。Q&A' 
        );
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => '',
                'black_title' => 'KDショッピングツアー',
                'detail_content' => '賢い消費者になる為の食材の選び方、KD&KDKがお勧めする食材をツアーでご紹介します。' 
        );
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => '',
                'black_title' => 'クッキング講座',
                'detail_content' => 'KD KITCHENのクラスを実際に体験する。Q&A' 
        );
        
        $contents ['program_sub_title'] = "Karada Detox 30日間 Healthy is Sexy<br>ライフスタイルチェンジプログラム";
        $contents ['program_sub_description'] = "3日目からは、各自30日間のKDプログラムを実践して頂きます。KDが
最も伝えたいNew York 流のライフスタイルを実際に体験することで、
KD & KD KITHCENの効果、楽しさ、意味を、体とマインドでしっかり
学んで頂けます。";
        
        $keys = array (
                'kdk_private_price',
                'kdk_private_price_per',
                'kdk_private_num_people',
                'kdk_private_schedule',
                'kdk_private_place',
                'kdk_private_required_items'
        );
        $data = $this->__getContents ( $keys );
        $contents['service_price'] = $data['kdk_private_price'] ;
        $contents['service_price_per'] = $data['kdk_private_price_per'] ;
        //$contents['service_num_people'] = $data['kdk_private_num_people'] ;
        //$contents['service_schedule'] = $data['kdk_private_price'] ;
        //$contents['service_place'] = $data['kdk_private_place'] ;
        $contents['service_schedule'] = $data['kdk_private_place'] ;
        $contents['service_deadline'] = $data['kdk_private_schedule'] ;
        $contents['service_required_items'] = $data['kdk_private_required_items'] ;
        
        $contents['price_summary_warning'] = array();
        $contents['price_summary_warning']['required_items2'] = array('index' => 1, 'value' => 'KDKスターターキットA:$78(税別)•エプロン•パンフレット200(US在住者向け、各自指定のジューサー購入要)<br>KDKスターターキットB:￥33,400(税別)•ジューサー（送料別途）•エプロン•パンフレット 200（日本在住者向け）<br><span class="attention">*</span>日本からお越しの方は、ご自身で移動、滞在先等の手配が必要です。<br><span class="attention">*</span>$でお支払いの費用はNY州の消費税となります。（8.875%）');
                
        return $contents;
    }
    
    private function getKDKTrainingContents($contents) {
        $contents ['page_summary'] = '1/10, 11 東京<br>1/17, 18 大阪';
        $contents ['session_sub_title'] = "KDダイエットコーチ MARIによる2日間のセッション";
        $contents ['session_pic_text'] = '<span class="thin" style="font-size:50px;">COACH:</span><span class="black" style="font-size:50px;">MARI</span>';
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_DAY1.png',
                'paragraphs' => array (
                        '<span class="description_normal">Karada Detox講座</span>',
                        '<span class="description_normal">KD KITCHEN講座</span>' 
                ) 
        );
        
        $contents ['session_descriptions'] [] = array (
                'image' => 'kdktraining/KDK_session_DAY2.png',
                'paragraphs' => array (
                        '<span class="description_normal">KD KITCHEN講座</span>',
                        '<span class="description_normal">クッキング講座</span>',
                ) 
        );
        $contents['top_sub_title'] = 'KDKトレーニング';
        $contents ['session_details'] = array ();
        $contents ['session_details'] ['title'] = '講座詳細';
        $contents ['session_details'] ['type'] = '3items';
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => 'DAY1.',
                'black_title' => 'デトックス講座',
                'detail_content' => 'KDの概念 ー 体の中からキレイになる方法やマインド、ライフスタイル定着への重要性'
        );
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => 'DAY2.',
                'black_title' => 'KD KITCHEN講座',
                'detail_content' => 'KD KITCHENの概念。クラスの運営方法やテクニックについて。Q&A'
        );
        $contents ['session_details'] ['content'] [] = array (
                'orange_title' => 'DAY2.',
                'black_title' => 'クッキング講座',
                'detail_content' => 'KD KITCHEN のクラスを実際に体験する。Q&A'
        );
    
        $contents ['program_sub_title'] = "Karada Detox 30日間 Healthy is Sexy<br>ライフスタイルチェンジプログラム";
        $contents ['program_sub_description'] = "3日目からは、各自30日間のKDプログラムを実践して頂きます。KDが
最も伝えたいNew York 流のライフスタイルを実際に体験することで、
KD & KD KITHCENの効果、楽しさ、意味を、体とマインドでしっかり
学んで頂けます。";
    
        $keys = array (
                'kdk_special_schedule_place',
                'kdk_special_price',
                'kdk_special_price_per',
                'kdk_special_required_items',
                'kdk_special_deadline'
        );
        $data = $this->__getContents ( $keys );
        $contents['service_price'] = $data['kdk_special_price'] ;
        $contents['service_price_per'] = $data['kdk_special_price_per'] ;
        $contents['service_schedule_place'] = $data['kdk_special_schedule_place'] ;
        $contents['service_required_items'] = $data['kdk_special_required_items'] ;
        $contents['service_deadline'] = $data['kdk_special_deadline'] ;
    
        $contents['price_summary_warning'] = array();
        $contents['price_summary_warning']['required_items2'] = array('index' => 1, 'value' => 'KDKスターターキット: ¥33,400(税別)•ジューサー(送料別途)•エプロン•パンフレットx200');
        $contents['extra_title'] = "東京 / 大阪　Winter 2016";
        return $contents;
    }
    
}
