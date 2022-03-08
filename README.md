## Blog Projesi

- Authorization sistemi için laravel/passport kullanıldı.
- Token süresi 1 saat olarak belirlendi (AuthServiceProvider).
- Repository Design Pattern kullanılmıştır.
- Abonelik sisteminde mail obverser ve notification üzerinden tanımlanmıştır.
**(Mail sistemi Queue yapısı üzerinde Job oluşturarak, Db üzerinden sıra ile çalışması sağlanabilir. Kuyruk dinlemek için: php artisan queue:listen kullanılabilir)**

* Postman collection yapısı Kategoriler için oluşturuldu(Blog.postman_collection.json)
* Database dump ı dosya halinde paylaşıldı.(Test için => email:mehmet@gmail.com, password:1) (blog.sql)
* Request isteklerinde Header (Accept : application/json) ayarlanmalıdır.
