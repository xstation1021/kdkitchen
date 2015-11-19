<?php
App::uses('AppModel', 'Model');

class UserPageAddress extends AppModel {

    public $belongsTo = array(
        'UserPage' => array(
            'className' => 'UserPage',
            'foreignKey'=> 'user_page_id',
        )
    );

    public function getLatLong($address) {
        $address = "106-6108+東京都港区六本木6-10-1";
        $address = str_replace(" ", "+", $address);
        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=japan");
        $json = json_decode($json);
        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return array('lat'=>$lat, 'long'=>$long);
    }

    public function beforeSave($options=array()) {
         
        $this->data['UserPageAddress']['zip'] = implode('-', $this->data['UserPageAddress']['zip']);
        if('-' == trim($this->data['UserPageAddress']['zip'])) {
            $this->data['UserPageAddress']['zip'] = '';
        }
        $address = $this->data['UserPageAddress']['zip'].' '.$this->data['UserPageAddress']['prefecture'].' '.$this->data['UserPageAddress']['street'];
        $lat_long = $this->getLatLong($address);
        $this->data['UserPageAddress']['latitude'] = $lat_long['lat'];
        $this->data['UserPageAddress']['longtitude'] = $lat_long['long'];
        return true;
    }

    public function translatePrefecture($prefecture, $eng_to_jap=True) {
        

        $eng_to_jap_map = array(
            "zenkoku"=>"全国",
            "hokkaido"=>"北海道",
            "aomori"=>"青森県",
            "iwate"=>"岩手県",
            "miyagi"=>"宮城県",
            "akita"=>"秋田県",
            "yamagata"=>"山形県",
            "fukushima"=>"福島県",
            "ibaraki"=>"茨城県",
            "tochigi"=>"栃木県",
            "gunma"=>"群馬県",
            "saitama"=>"埼玉県",
            "chiba"=>"千葉県",
            "tokyo"=>"東京都",
            "kanagawa"=>"神奈川県",
            "niigata"=>"新潟県",
            "toyama"=>"富山県",
            "ishikawa"=>"石川県",
            "fukui"=>"福井県",
            "yamanashi"=>"山梨県",
            "nagano"=>"長野県",
            "gifu"=>"岐阜県",
            "shizuoka"=>"静岡県",
            "aichi"=>"愛知県",
            "mie"=>"三重県",
            "shiga"=>"滋賀県",
            "kyoto"=>"26",
            "osaka"=>"大阪府",
            "hyogo"=>"兵庫県",
            "nara"=>"奈良県",
            "wakayama"=>"和歌山県",
            "tottori"=>"鳥取県",
            "shimane"=>"島根県",
            "okayama"=>"岡山県",
            "hiroshima"=>"広島県",
            "yamaguchi"=>"山口県",
            "tokushima"=>"徳島県",
            "aoyama"=>"香川県",
            "ehime"=>"愛媛県",
            "kouchi"=>"高知県",
            "fukuoka"=>"福岡県",
            "saga"=>"佐賀県",
            "nagasaki"=>"長崎県",
            "kumamoto"=>"熊本県",
            "ooita"=>"大分県",
            "miyazaki"=>"宮崎県",
            "kagoshima"=>"鹿児島県",
            "okinawa"=>"沖縄県"
        );
        
        if($eng_to_jap && isset($eng_to_jap_map[$prefecture])) {
            return $eng_to_jap_map[$prefecture];
        }

        $jap_to_eng_map = array_flip($eng_to_jap_map);
        if(!$eng_to_jap && isset($jap_to_eng_map[$prefecture])) {
            return $jap_to_eng_map[$prefecture];
        }

        return False;
    }
}
