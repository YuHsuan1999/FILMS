import urllib.request as req
import bs4
import pymysql
from urllib.parse import urlparse




for i in [0,51]:
    url = "https://www.imdb.com/search/title/?genres=comedy&start={}&explore=title_type,genres&ref_=adv_nxt"
    url = url.format(i)
    request = req.Request(url, headers={
    "User-Agent":"Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1"})

    with req.urlopen(request) as response:
        data = response.read().decode("utf-8")

    root = bs4.BeautifulSoup(data, "html.parser")

    titles1 = root.find_all("div" , class_= "lister-item-content")
    intro = root.find_all("p", class_="text-muted")
    count = 1
    print(url)

    for title1 in titles1 :
        conn = pymysql.connect(                   #連結資料庫
        host='127.0.0.1',
        user='root',
        passwd='',
        database='作業',
        charset='utf8',)   
        cursor = conn.cursor()

        genre1 = title1.find("span" , class_= "genre")
        titleTemp1 = title1.a.get_text()
        genreTemp2 = genre1.get_text()
        print(titleTemp1,genreTemp2)
        introTemp3 = intro[count].get_text()
        print(introTemp3)

        sql1 = "INSERT INTO movie(MovieTitle,Classification,Introduction) VALUES('%s','%s','%s');"%(titleTemp1,genreTemp2,introTemp3)
        
        count  = count + 2

        try :
            cursor.execute(sql1)
            conn.commit() 
            print("Succeed")
            
        except:
            conn.rollback() 

conn.close()
    

 








