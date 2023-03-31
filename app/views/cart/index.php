<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="row">
        <div class="col-5">
            <div class="container checkPaymentSection d-flex pt-5">
                <div>
                    <h1>Payment</h1>
                    <hr>
                    <p>Pay With:</p>
                    <input type="radio" id="card" name="cardType">
                    <label for="card">Card</label>
                    <input type="radio" id="ideal" name="cardType">
                    <label for="ideal">Ideal</label><br><br>

                    <label for="">Card Number</label>
                    <input type="text" class="form-control" placeholder="1234 5678 9101 1121"><br>

                    <div class="d-flex justify-content-between">
                        <div class="me-2">
                            <label for="">Expiration Date</label>
                            <input type="text" class="form-control" placeholder="MM/YY"><br>
                        </div>
                        <div class="ms-2">
                            <label for="">CVV</label>
                            <input type="text" class="form-control" placeholder="123"><br>
                        </div>
                    </div>

                    <a class="btn btn-primary btn-lg" href="payment"> Pay €<?= number_format($totalAmount, 2) ?> </a><br><br>

                    <p>
                        Your personal data will be used to process your order, support your experience throughout this website,
                        and for other purposes described in our privacy policy.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-7">
            <div class="container h-100 checkoutOrderSummarySection pt-5">
                <h1>Order Summary</h1>
                <hr>
                <?php if (!empty($data)) { ?>
                    <?php foreach ($data as $item) { ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-1">
                                        <img src="/img/ReservationIcon.png" alt="">
                                    </div>
                                    <div class="col-3">
                                        <h2><b><?= $item['restaurant'] ?></b></h2>
                                        <p><b>Comment:</b> <?= $item['comment']?></p>
                                        <p><b>People:</b> <?= $item['amountAbove12'] + $item['amountUnderOr12'] ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p>
                                            <?php
                                            $date = new DateTime($item['date']);
                                            echo $date->format('F jS');
                                            ?>
                                        </p>
                                        <p><?= $item['session'] ?></p>
                                    </div>
                                    <div class="col-2 d-flex" style="width: 20%">
                                        <button class="btn btn-dark w-30">-</button>
                                        <input type="text" name="quantity" id="quantity-input" class="form-control" value="1">
                                        <button class="btn btn-dark w-30">+</button>
                                    </div>
                                    <div class="col-3" style="width: 13%">
                                        <p><b>€<?= number_format($item['price'], 2); ?></b></p>
                                    </div>
                                    <div class="col-2">
                                    <a class="btn btn-danger" href="removeItem?id=<?=$item['id'];?>">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p>There are no items in your cart.</p>
                <?php } ?>

                <hr>

                <div class="d-flex justify-content-between checkTotal">
                    <p>Total</p>
                    <p class="amount">€<?= number_format($totalAmount, 2) ?></p>
                </div>

                <p>9% VAT</p>

            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
     
    <script>
        getCartAmount();

        const quantityInput = document.getElementById('quantity-input');
        quantityInput.addEventListener('input', (event) => {
            const newValue = event.target.value.replace(/[^\d]/g, ''); // remove non-numeric characters
            event.target.value = newValue;
        });
    </script>
</body>

</html>