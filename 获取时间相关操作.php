
<?php  
echo "今天:".date("Y-m-d")."<br>";       
echo "昨天:".date("Y-m-d",strtotime("-1 day")), "<br>";       
echo "明天:".date("Y-m-d",strtotime("+1 day")). "<br>";    
echo "一周后:".date("Y-m-d",strtotime("+1 week")). "<br>";       
echo "一周零两天四小时两秒后:".date("Y-m-d G:H:s",strtotime("+1 week 2 days 4 hours 2 seconds")). "<br>";       
echo "下个星期四:".date("Y-m-d",strtotime("next Thursday")). "<br>";       
echo "上个周一:".date("Y-m-d",strtotime("last Monday"))."<br>";       
echo "一个月前:".date("Y-m-d",strtotime("last month"))."<br>";       
echo "一个月后:".date("Y-m-d",strtotime("+1 month"))."<br>";       
echo "十年后:".date("Y-m-d",strtotime("+10 year"))."<br>";      
?>


/*strtotime()函数的作用是将日期时间描述解析为 Unix 时间戳
int strtotime ( string time [, int now] )
PHP星期几获取代码：
date("l");
//data就可以获取英文的星期比如Sunday
date("w");
//这个可以获取数字星期比如123，注意0是星期日
获取中文星期可以这样
$weekarray=array("日","一","二","三","四","五","六");
echo "星期".$weekarray[date("w")];
获取指定日期是：
$weekarray=array("日","一","二","三","四","五","六");
echo "星期".$weekarray[date("w","2011-11-11")];
因为date函数非常强大，他完全可以胜任一切这样的工作我附个手册里的表吧
a - "am" 或是 "pm"
A - "AM" 或是 "PM"
d - 几日，二位数字，若不足二位则前面补零; 如: "01" 至 "31"
D - 星期几，三个英文字母; 如: "Fri"
F - 月份，英文全名; 如: "January"
h - 12 小时制的小时; 如: "01" 至 "12"
H - 24 小时制的小时; 如: "00" 至 "23"
g - 12 小时制的小时，不足二位不补零; 如: "1" 至 12"
G - 24 小时制的小时，不足二位不补零; 如: "0" 至 "23"
i - 分钟; 如: "00" 至 "59"
j - 几日，二位数字，若不足二位不补零; 如: "1" 至 "31"
l - 星期几，英文全名; 如: "Friday"
m - 月份，二位数字，若不足二位则在前面补零; 如: "01" 至 "12"
n - 月份，二位数字，若不足二位则不补零; 如: "1" 至 "12"
M - 月份，三个英文字母; 如: "Jan"
s - 秒; 如: "00" 至 "59"
S - 字尾加英文序数，二个英文字母; 如: "th"，"nd"
t - 指定月份的天数; 如: "28" 至 "31"
U - 总秒数
w - 数字型的星期几，如: "0" (星期日) 至 "6" (星期六)
Y - 年，四位数字; 如: "1999"
y - 年，二位数字; 如: "99"
z - 一年中的第几天; 如: "0" 至 "365"*/
