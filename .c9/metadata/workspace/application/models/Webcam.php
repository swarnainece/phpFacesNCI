{"filter":false,"title":"Webcam.php","tooltip":"/application/models/Webcam.php","undoManager":{"mark":39,"position":39,"stack":[[{"start":{"row":0,"column":0},"end":{"row":23,"column":2},"action":"insert","lines":["<?php","defined('BASEPATH') OR exit('No direct script access allowed');","","class Blog extends CI_Model {","    ","     public function testModel()","        {","               echo \" luv u  shu \" ;","        }","     ","     ","     public function insert_data($data) {","          ","            $this->db->insert(\"name\" , $data) ;","          ","          ","     }","","\t","\t","\t","}","","?>"],"id":1}],[{"start":{"row":3,"column":6},"end":{"row":3,"column":10},"action":"remove","lines":["Blog"],"id":2},{"start":{"row":3,"column":6},"end":{"row":3,"column":7},"action":"insert","lines":["W"]}],[{"start":{"row":3,"column":7},"end":{"row":3,"column":8},"action":"insert","lines":["e"],"id":3}],[{"start":{"row":3,"column":8},"end":{"row":3,"column":9},"action":"insert","lines":["b"],"id":4}],[{"start":{"row":3,"column":9},"end":{"row":3,"column":10},"action":"insert","lines":["c"],"id":5}],[{"start":{"row":3,"column":10},"end":{"row":3,"column":11},"action":"insert","lines":["a"],"id":6}],[{"start":{"row":3,"column":11},"end":{"row":3,"column":12},"action":"insert","lines":["m"],"id":7}],[{"start":{"row":5,"column":5},"end":{"row":16,"column":6},"action":"remove","lines":["public function testModel()","        {","               echo \" luv u  shu \" ;","        }","     ","     ","     public function insert_data($data) {","          ","            $this->db->insert(\"name\" , $data) ;","          ","          ","     }"],"id":8},{"start":{"row":5,"column":5},"end":{"row":14,"column":13},"action":"insert","lines":["public function face_detect($file) {","         ","               if (!is_file($file)) {","                    throw new Exception(\"Can not load $file\");","               }","","         else {","","        \techo \"Hi Successs\" ;","           } "]}],[{"start":{"row":14,"column":13},"end":{"row":15,"column":0},"action":"insert","lines":["",""],"id":9},{"start":{"row":15,"column":0},"end":{"row":15,"column":11},"action":"insert","lines":["           "]}],[{"start":{"row":15,"column":8},"end":{"row":15,"column":9},"action":"insert","lines":["}"],"id":10},{"start":{"row":15,"column":0},"end":{"row":15,"column":8},"action":"remove","lines":["        "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":5},"action":"insert","lines":["     "]}],[{"start":{"row":17,"column":1},"end":{"row":18,"column":1},"action":"remove","lines":["","\t"],"id":11}],[{"start":{"row":17,"column":0},"end":{"row":17,"column":1},"action":"remove","lines":["\t"],"id":12}],[{"start":{"row":16,"column":0},"end":{"row":17,"column":0},"action":"remove","lines":["",""],"id":13}],[{"start":{"row":15,"column":9},"end":{"row":16,"column":0},"action":"remove","lines":["",""],"id":14}],[{"start":{"row":5,"column":41},"end":{"row":6,"column":0},"action":"insert","lines":["",""],"id":15},{"start":{"row":6,"column":0},"end":{"row":6,"column":9},"action":"insert","lines":["         "]}],[{"start":{"row":9,"column":20},"end":{"row":9,"column":39},"action":"remove","lines":["throw new Exception"],"id":16}],[{"start":{"row":9,"column":20},"end":{"row":10,"column":0},"action":"insert","lines":["",""],"id":17},{"start":{"row":10,"column":0},"end":{"row":10,"column":20},"action":"insert","lines":["                    "]}],[{"start":{"row":10,"column":20},"end":{"row":10,"column":21},"action":"insert","lines":[" "],"id":18}],[{"start":{"row":10,"column":21},"end":{"row":10,"column":22},"action":"insert","lines":["e"],"id":19}],[{"start":{"row":10,"column":22},"end":{"row":10,"column":23},"action":"insert","lines":["c"],"id":20}],[{"start":{"row":10,"column":23},"end":{"row":10,"column":24},"action":"insert","lines":["h"],"id":21}],[{"start":{"row":10,"column":24},"end":{"row":10,"column":25},"action":"insert","lines":["o"],"id":22}],[{"start":{"row":10,"column":25},"end":{"row":10,"column":26},"action":"remove","lines":["("],"id":23}],[{"start":{"row":10,"column":25},"end":{"row":10,"column":26},"action":"insert","lines":[" "],"id":24}],[{"start":{"row":10,"column":46},"end":{"row":10,"column":47},"action":"remove","lines":[")"],"id":25}],[{"start":{"row":10,"column":45},"end":{"row":10,"column":46},"action":"remove","lines":["\""],"id":26}],[{"start":{"row":10,"column":44},"end":{"row":10,"column":45},"action":"remove","lines":["e"],"id":27}],[{"start":{"row":10,"column":43},"end":{"row":10,"column":44},"action":"remove","lines":["l"],"id":28}],[{"start":{"row":10,"column":42},"end":{"row":10,"column":43},"action":"remove","lines":["i"],"id":29}],[{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"remove","lines":["f"],"id":30}],[{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"remove","lines":["$"],"id":31}],[{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"remove","lines":[" "],"id":32}],[{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"insert","lines":["\""],"id":33}],[{"start":{"row":5,"column":31},"end":{"row":5,"column":32},"action":"remove","lines":["t"],"id":34}],[{"start":{"row":5,"column":30},"end":{"row":5,"column":31},"action":"remove","lines":["c"],"id":35}],[{"start":{"row":5,"column":29},"end":{"row":5,"column":30},"action":"remove","lines":["e"],"id":36}],[{"start":{"row":5,"column":28},"end":{"row":5,"column":29},"action":"remove","lines":["t"],"id":37}],[{"start":{"row":5,"column":27},"end":{"row":5,"column":28},"action":"remove","lines":["e"],"id":38}],[{"start":{"row":5,"column":26},"end":{"row":5,"column":27},"action":"remove","lines":["d"],"id":39}],[{"start":{"row":5,"column":25},"end":{"row":5,"column":26},"action":"remove","lines":["_"],"id":40}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":5,"column":25},"end":{"row":5,"column":25},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":5,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1507809814741,"hash":"4ac02dd5ba72285b6635b52c0021eae33c6c2432"}