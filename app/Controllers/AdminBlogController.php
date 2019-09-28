<?php

// if (is_dir(DB)) {
//     // echo DB;
// // opendir — Открывает дескриптор каталога
// // Открыть известный каталог и начать считывать его содержимое
//     if ($dh = opendir(DB)) {
//         while (($file = readdir($dh)) !== false) {
//             echo "файл: $file : тип: " . filetype(DB .'/'. $file) . "<br>";
//         }
//         closedir($dh);
//     }
// }

$workdir = null;

// if (is_dir(DB)) {
//     if ($dh = opendir(DB)) {
//         while (($file = readdir($dh)) !== false) {
//             if ($file == 'data' && filetype(DB .'/'. $file)=='dir') {
//                 $workdir = DB .'/'. $file;
//             }
//         }
//         echo "Dir: $workdir" . "<br>";
//         closedir($dh);
//     }
// }

// if (is_dir(DB)) {
//     if ($dh = opendir(DB)) {
//         while (($file = readdir($dh)) !== false) {
//             if ($file == 'data' && filetype(DB .'/'. $file)=='dir') {
//                 $workdir = DB .'/'. $file;
//             }
//         }
        // if (!$workdir) {
        //     $workdir = DB .'/data';
        //     mkdir($workdir, 0777);
        // }
//         echo "Dir: $workdir" . "<br>";
//         closedir($dh);
//     }
// }

// if (is_dir(DB)) {
//     if ($dh = opendir(DB)) {
//         while (($file = readdir($dh)) !== false) {
//             if ($file == 'data' && filetype(DB .'/'. $file)=='dir') {
//                 $workdir = DB .'/'. $file;
//             }
//         }
//         if (!$workdir) {
//             $workdir = DB .'/data';
//             mkdir($workdir, 0777);
//         }

        // $file = DB.'/blog.json';
        // $newfile = $workdir.'/blog.json';
        
        // if (!copy($file, $newfile)) {
        //     echo "не удалось скопировать $file...\n";
        // } else {
        //     echo "удалось скопировать $newfile...\n";
        // }
//         closedir($dh);
//     }
// }

if (is_dir(DB)) {
    if ($dh = opendir(DB)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == 'data' && filetype(DB .'/'. $file)=='dir') {
                $workdir = DB .'/'. $file;
            }
        }
        if (!$workdir) {
            $workdir = DB .'/data';
            mkdir($workdir, 0777);
        } 
        
        if ($wdh = opendir($workdir)) {
            while (($f = readdir($wdh)) !== false) {
                if ($f == 'blog.json' && is_file($f)) {
                    unlink($f);
                }
            }
            closedir($wdh);   
        }

        $file = DB.'/blog.json';
        $newfile = $workdir.'/blog.json';
            
        if (!copy($file, $newfile)) {
            echo "не удалось скопировать $file...\n";
        } else {
            echo "удалось скопировать $newfile...\n";
        }
    }
    closedir($dh);
}

// $data = file_get_contents(DB.'/blog.json');

// load file
// $data = file_get_contents(DB.'/blog.json');

// decode json to associative array
// $posts = json_decode($data, true);
// $title = 'Admin Blog';

// if (!empty($_POST)) {
//     if (!$_POST['title'] or !$_POST['content']) {
//         $error = "<h2>please complete all the fields</h2>";
//     } else {
//         $id = count($posts)+1;
//         // add data
//         $posts[] = array('id'=>$id, 'title'=>$_POST['title'], 'content'=>$_POST['content'], 'created_at'=>date(DATE_RFC822));
//         // encode json and save to file
//         file_put_contents(DB.'/blog.json', json_encode($posts));
//     }
// }

// view('blog/add', compact('title', 'posts'));
