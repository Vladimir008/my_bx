Начиная с 16 версии используется новая версия ядра магазина Битрикс, являющаяся частью ядра Битрикс D7. Многое описанное здесь может работать и в переходной версии 15.5. Все классы для работы с магазином собраны в модуле sale, поэтому для работы примером используем use для пространства модуля интернет-магазина.

use Bitrix\Sale;
Заказ (Sale\Order)
Заказ представляет собой объект класса Bitrix\Sale\Order. Нужно запомнить, что пока не вызван метод save() этот объект необязательно связан с сохранённым заказом. Также пока вы не вызовете save(), изменения в заказе не будут сохранены в базе данных.

Существующий заказ можно получить следующим образом:

/** int $orderId ID заказа */
$order = Sale\Order::load($orderId);

/** mixed $orderNumber номер заказа */
$order = Sale\Order::loadByAccountNumber($orderNumber);
Поля заказа можно получить короткими вызовами:

$order->getId(); // ID заказа
$order->getSiteId(); // ID сайта
$order->getDateInsert(); // объект Bitrix\Main\Type\DateTime
$order->getPersonTypeId(); // ID типа покупателя
$order->getUserId(); // ID пользователя

$order->getPrice(); // Сумма заказа
$order->getDiscountPrice(); // Размер скидки
$order->getDeliveryPrice(); // Стоимость доставки
$order->getSumPaid(); // Оплаченная сумма
$order->getCurrency(); // Валюта заказа

$order->isPaid(); // true, если оплачен
$order->isAllowDelivery(); // true, если разрешена доставка
$order->isShipped(); // true, если отправлен
$order->isCanceled(); // true, если отменен
Также любое поле по имени можно получить так:

$order->getField("ORDER_WEIGHT"); // Вес заказа
$order->getField('PRICE'); // Сумма заказа
// Изменение поля:
$order->setField('USER_DESCRIPTION', 'Комментарий к заказу');
$order->save();
Список доступных полей можно получить, вызвав $order->getAvailableFields().

Заказ имеет связь один-ко-многим с несколькими объектами в виде коллекций - коллекция товаров в корзине (Sale\Basket), коллекция отгрузок (Sale\ShipmentCollection), коллекция оплат (Sale\PaymentCollection) и коллекция свойств заказа (Sale\PropertyValueCollection).

Самый простой способ получить список способов доставки и оплаты - короткие вызовы:

$paymentIds = $order->getPaymentSystemId(); // массив id способов оплат
$deliveryIds = $order->getDeliverySystemId(); // массив id способов доставки
Чтобы получить список примененных к заказу скидок, нужно вызвать:

$discountData = $order->getDiscount()->getApplyResult();
В массиве $discountData['DISCOUNT_LIST'] содержится список скидок, в $discountData['COUPON_LIST'] содержится список купонов. Т.к. скидки можно отключать в админке, следует проверять поле APPLY: если Y - скидка/купон применёны, если N - были отключены менеджером.