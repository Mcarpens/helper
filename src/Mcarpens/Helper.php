<?php

namespace Helper;

use DateTime;

class Helper
{
    /**
     * Redirect to a in page url
     * @param $url
     */
    public function redirect($url)
    {
        header("Location: /" . $url);
    }

    /**
     * Get time ago from a timestamp
     * @param $datetime
     * @param bool $full
     * @return string
     * @throws Exception
     */
    public function timeAgo($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }


    /**
     * Get a formatted time output
     * Type 1 : Full date -> 2018-10-01 12:00:00
     * Type 2 : Full date without seconds -> 2018-10-01 12:00
     * Type 3 : Full date -> 01-10-2018 12:00:00
     * Type 4 : Full date without seconds -> 01-10-2018 12:00
     * Type 5 : Day number, Month name and year -> 01 October 2018
     * Type 6 : Day number and Month name -> 01 October
     * Type 7 : Month and Year -> October 2018
     * Type 8 : Only day -> 01
     * Type 9: Only month name -> October
     * Type 10 : Only month number -> 10
     * Type 11 : Only Year -> 2018
     * Type 12 : Only full time -> 12:00:00
     * Type 13 : Just hour and minut -> 12:00
     *
     * @param null $timestamp
     * @param $type
     * @return false|string
     */
    public function getFormattedTime($timestamp, $type)
    {
        if($type == 1) {
            // Type 1 : Full date -> 2018-10-01 12:00:00 //
            return date("Y-m-d H:i:s", strtotime($timestamp));
        }
        if($type == 2) {
            // Type 2 : Full date without seconds -> 2018-10-01 12:00 //
            return date("Y-m-d H:i", strtotime($timestamp));
        }
        if($type == 3) {
            // Type 3 : Full date -> 01-10-2018 12:00:00 //
            return date("d-m-Y H:i:s", strtotime($timestamp));
        }
        if($type == 4) {
            // Type 4 : Full date without seconds -> 01-10-2018 12:00 //
            return date("d-m-Y H:i", strtotime($timestamp));
        }
        if($type == 5) {
            // Type 5 : Day number, Month name and year -> 01 Oct 2018 //
            return date("d M Y", strtotime($timestamp));
        }
        if($type == 6) {
            // Type 6 : Day number and Month name -> 01 Oct //
            return date("d M", strtotime($timestamp));
        }
        if($type == 7) {
            // Type 7 : Month and Year -> Oct 2018 //
            return date("M Y", strtotime($timestamp));
        }
        if($type == 8) {
            // Type 8 : Only day -> 01 //
            return date("d", strtotime($timestamp));
        }
        if($type == 9) {
            // Type 9: Only month name -> Oct  //
            return date("M", strtotime($timestamp));
        }
        if($type == 10) {
            // Type 10 : Only month number -> 10 //
            return date("m", strtotime($timestamp));
        }
        if($type == 11) {
            // Type 11 : Only Year -> 2018 //
            return date("Y", strtotime($timestamp));
        }
        if($type == 12) {
            // Type 12 : Only full time -> 12:00:00 //
            return date("H:i:s", strtotime($timestamp));
        }
        if($type == 13) {
            // Type 13 : Just hour and minute -> 12:00 //
            return date("H:i", strtotime($timestamp));
        }
        else {
            // Custom type : You provide the format in the method //
            return date("$type", strtotime($timestamp));
        }
    }

    /**
     * Get the CPU usage
     * @return mixed
     */
    public function get_server_cpu_usage()
    {
        $load = sys_getloadavg();
        return $load[0];
    }

    /**
     * Convert a number to price format
     * @param $number
     * @param int $precision
     * @param string $separator
     * @return string
     */
    public function numberFormatPrecision($number, $precision = 2, $separator = '.')
    {
        $numberParts = explode($separator, $number);
        $response = $numberParts[0];
        if(count($numberParts)>1){
            $response .= $separator;
            $response .= substr($numberParts[1], 0, $precision);
        }
        return $response;
    }

    /**
     * Convert string to slugify
     * @param $text
     * @return false|string|string[]|null
     */
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n/a';
        }

        return $text;
    }

    /**
     * Get the month
     * @param $month
     * @return string
     */
    public function getMonth($month)
    {
        if($month == 1) {
            return 'January';
        } else if ($month == 2) {
            return 'February';
        } else if ($month == 3) {
            return 'March';
        } else if ($month == 4) {
            return 'April';
        } else if ($month == 5) {
            return 'May';
        } else if ($month == 6) {
            return 'June';
        } else if ($month == 7) {
            return 'July';
        } else if ($month == 8) {
            return 'August';
        } else if ($month == 9) {
            return 'September';
        } else if ($month == 10) {
            return 'October';
        } else if ($month == 11) {
            return 'November';
        } else if($month == 12) {
            return 'December';
        } else {
            return 'N/A';
        }
    }

    /**
     * Generate random string
     */
    public static function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Short text
     * @param $text
     * @param $start
     * @param $length
     * @return string
     */
    public function textShortner($text,$start,$length)
    {
        $string = strlen($text) >= $length ? substr($text, $start, $length) . '...' : $text;
        return strip_tags($string);
    }
}