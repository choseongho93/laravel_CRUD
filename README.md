# Laravel을 이용한 CRUD
PHP 라라벨 프레임워크를 이용하여 간단한 CRUD를 구현하였습니다.<br>
개인 local PC에서 사용하기 위함으로 작업되었습니다.

## 사용 기술
* 언어 : PHP 7.2
* 프레임워크 : Laravel 8 Valet(발렛)
* 운영체제 : MacOS
* 데이터베이스 : MySQL 5.7

## 주요 기능
1. Boards의 간단한 CRUD 구현 (view)
2. User의 간단한 CRUD api 구현 (API)
3. MySQL로 데이터 적재 및 Redis를 이용하여 Cache 구현
4. Queue(redis) Job을 통해 Mail발송 구현
5. horizon 설치

## 설치방법
1. brew install php@7.2
2. composer 설치 (https://getcomposer.org/download/)
3. composer global require laravel/valet
4. valet use php@7.2
