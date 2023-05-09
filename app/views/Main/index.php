<main>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="value_ok" fill="#198754" viewBox="0 0 8 8">
      <path d="M2.3 6.73.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z"></path>
    </symbol>
  </svg>
  <div class="container">
    <div class="row">
      <h1 class="mt-1">Оплата коммунальных услуг</h1>
    </div>
    <div class="breadcrumb filters">
      <div class="col-auto me-3">
        <div class="input-group">
          <label class="input-group-text" for="select_year">Год</label>
          <select class="form-select" id="select_year">
            <option value="2021" <?php /** @var string $year */
            if ($year == '2021') echo ' selected'; ?>>2021</option>
            <option value="2022" <?php if ($year == '2022') echo ' selected'; ?>>2022</option>
            <option value="2023" <?php if ($year == '2023') echo ' selected'; ?>>2023</option>
          </select>
        </div>
      </div>
      <div class="col-auto me-3">
        <div class="input-group">
          <label class="input-group-text" for="select_month">Месяц</label>
          <select class="form-select" id="select_month">
            <option value="01" <?php /** @var string $month */
            if ($month == '01') echo ' selected'; ?>>Январь</option>
            <option value="02" <?php if ($month == '02') echo ' selected'; ?>>Февраль</option>
            <option value="03" <?php if ($month == '03') echo ' selected'; ?>>Март</option>
            <option value="04" <?php if ($month == '04') echo ' selected'; ?>>Апрель</option>
            <option value="05" <?php if ($month == '05') echo ' selected'; ?>>Май</option>
            <option value="06" <?php if ($month == '06') echo ' selected'; ?>>Июнь</option>
            <option value="07" <?php if ($month == '07') echo ' selected'; ?>>Июль</option>
            <option value="08" <?php if ($month == '08') echo ' selected'; ?>>Август</option>
            <option value="09" <?php if ($month == '09') echo ' selected'; ?>>Сентябрь</option>
            <option value="10" <?php if ($month == '10') echo ' selected'; ?>>Октябрь</option>
            <option value="11" <?php if ($month == '11') echo ' selected'; ?>>Ноябрь</option>
            <option value="12" <?php if ($month == '12') echo ' selected'; ?>>Декабрь</option>
          </select>
        </div>
      </div>
    </div>
    <div class="my_pay">
      <?php
      $pay1 = 0; $pay2 = 0; $pay3 = 0; $pay4 = 0; $pay5 = 0;
      $pay6 = 0; $pay7 = 0; $pay8 = 0; $pay9 = 0; $sum1 = 0.00;
      $pay11 = 0; $pay12 = 0; $pay13 = 0; $pay14 = 0; $pay15 = 0;
      $pay16 = 0; $pay17 = 0; $pay18 = 0; $pay19 = 0; $sum2 = 0.00;
      foreach ($payments as $payment) {
        if ($payment['name'] == 'ЖКХ')
        {
          if ($payment['service'] == 'Содержание') $pay1 = $payment['summa'];
          if ($payment['service'] == 'Вода') $pay2 = $payment['summa'];
          if ($payment['service'] == 'Отопление') $pay3 = $payment['summa'];
          if ($payment['service'] == 'Капремонт') $pay4 = $payment['summa'];
          if ($payment['service'] == 'Газ') $pay5 = $payment['summa'];
          if ($payment['service'] == 'ТКО') $pay6 = $payment['summa'];
          if ($payment['service'] == 'Электроэнергия') $pay7 = $payment['summa'];
          if ($payment['service'] == 'Интернет') $pay8 = $payment['summa'];
          if ($payment['service'] == 'Домофон') $pay9 = $payment['summa'];
          $sum1 += $payment['summa'];
        }
        if ($payment['name'] == 'УК')
        {
          if ($payment['service'] == 'Содержание') $pay11 = $payment['summa'];
          if ($payment['service'] == 'Капремонт') $pay12 = $payment['summa'];
          if ($payment['service'] == 'Вода') $pay13 = $payment['summa'];
          if ($payment['service'] == 'Отопление') $pay14 = $payment['summa'];
          if ($payment['service'] == 'Газ') $pay15 = $payment['summa'];
          if ($payment['service'] == 'ГазТО') $pay16 = $payment['summa'];
          if ($payment['service'] == 'ТКО') $pay17 = $payment['summa'];
          if ($payment['service'] == 'Электроэнергия') $pay18 = $payment['summa'];
          if ($payment['service'] == 'Домофон') $pay19 = $payment['summa'];
          $sum2 += $payment['summa'];
        }
      }
      ?>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
            <b>Чайкиной 56-324</b><br>
            Комсомольский район<br>
            Оплачено - <b><?= number_format($sum1, 2, ',', '&nbsp;');?> ₽</b>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
            <b>Горького 66-51</b><br>
            Центральный район<br>
            Оплачено - <b><?= number_format($sum2, 2, ',', '&nbsp;');?> ₽</b>
          </button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <ol class="mt-3">
            <li>
              <p>Скачиваем квитанцию с сайта <a href="https://ikvp.ru/?username=63107022145&password=42306500" target="_blank">ООО «ДЖКХ»</a>. Логин 63107022145. Пароль 42306500.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию с сайта <a href="https://мойгаз.смородина.онлайн/login" target="_blank">Смородина</a> или с сайта <a href="https://paygas.ru/63/account/32503282" target="_blank">PayGas</a>. Логин 63107022145. Пароль 42306500.</p>
              <p>логин: deryabino@gmail.com.  пароль: Big@Oleksha@07051967.</p>
              <p>Для Смородины - Лицевой счет: 163034021534. пароль: kC9mERm3.</p>
              <p>Для PayGas - Лицевой счет: 32503282. Номер счетчика: 00332751.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию с <a href="https://lk.samaraenergo.ru/" target="_blank">сайта</a>. Лицевой счет: 050900691990. Пароль: 868885.</p>
            </li>
            <li>
              <p>Оплачиваем через <a href="https://online.sberbank.ru/CSAFront/index.do?login=w9663331189" target="_blank">Сбербанк-Онлайн</a>. Логин: w9663331189. Пароль: 99GJAIPU.</p>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Содержание" hidden>
                    <input type="text" name="payment" id="payment" value="pay1" hidden>
                    <span class="input-group-text">Cодержание – Получатель:&nbsp;<strong>ООО «ЕРЦ г. Тольятти»</strong>, ИНН:&nbsp;<strong>6321427356</strong>. (л/счет:&nbsp;<strong>63107022145</strong>)</span>
                    <?php if ($pay1 > 0): ?>
                      <input type="number" name="pay1" class="form-control input-right" id="pay1" placeholder="" step="0.01" value="<?= $pay1; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon1" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon1"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay1" class="form-control input-right" id="pay1" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Оплата</button>
                      <span class="input-group-text" id="basic-addon1"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Вода" hidden>
                    <input type="text" name="payment" id="payment" value="pay2" hidden>
                    <span class="input-group-text">Вода – Получатель:&nbsp;<strong>ООО «Волжские коммунальные системы»</strong>, ИНН:&nbsp;<strong>6312101799</strong>. (л/счет:&nbsp;<strong>63207022145</strong>) (с комиссией 1%)</span>
                    <?php if ($pay2 > 0): ?>
                      <input type="number" name="pay2" class="form-control input-right" id="pay2" placeholder="" step="0.01" value="<?= $pay2; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon1"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay2" class="form-control input-right" id="pay2" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Оплата</button>
                      <span class="input-group-text" id="basic-addon2"><img src="img/no.svg" width="20" height="20" alt="">
                    </span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Отопление" hidden>
                    <input type="text" name="payment" id="payment" value="pay3" hidden>
                    <span class="input-group-text">Отопление – Получатель:&nbsp;<strong>«Квартплата 24»</strong>, АО «АЛЬФА-БАНК», ИНН:&nbsp;<strong>7728168971</strong>. (л/счет:&nbsp;<strong>30262884434</strong>) (с комиссией 1%)</span>
                    <?php if ($pay3 > 0): ?>
                      <input type="number" name="pay3" class="form-control input-right" id="pay3" placeholder="" step="0.01" value="<?= $pay3; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon3" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon1"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay3" class="form-control input-right" id="pay3" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon3">Оплата</button>
                      <span class="input-group-text" id="basic-addon3"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Капремонт" hidden>
                    <input type="text" name="payment" id="payment" value="pay4" hidden>
                    <span class="input-group-text">Капремонт – Получатель:&nbsp;<strong>НКО «ФКР»</strong>, ИНН:&nbsp;<strong>7720367661</strong>. (идентификатор плательщика:&nbsp;<strong>517189707096507</strong>) - 593,97</span>
                    <?php if ($pay4 > 0): ?>
                      <input type="number" name="pay4" class="form-control input-right" id="pay4" placeholder="" step="0.01" value="<?= $pay4; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon4" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon4"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay4" class="form-control input-right" id="pay4" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon4">Оплата</button>
                      <span class="input-group-text" id="basic-addon4">
                        <img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Газ" hidden>
                    <input type="text" name="payment" id="payment" value="pay5" hidden>
                    <span class="input-group-text">Газ – Получатель:&nbsp;<strong>ООО «Газпром межрегионгаз Самара»</strong>, ИНН:&nbsp;<strong>6310000026</strong>. (л/счет:&nbsp;<strong>163034021534</strong>)</span>
                    <?php if ($pay5 > 0): ?>
                      <input type="number" name="pay5" class="form-control input-right" id="pay5" placeholder="" step="0.01" value="<?= $pay5; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon5" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon5"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay5" class="form-control input-right" id="pay5" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon5">Оплата</button>
                      <span class="input-group-text" id="basic-addon5"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="ТКО" hidden>
                    <input type="text" name="payment" id="payment" value="pay6" hidden>
                    <span class="input-group-text">Вывоз ТКО – Получатель:&nbsp;<strong>ООО «ЭкоСтройРесурс»</strong>, ИНН:&nbsp;<strong>6316186232</strong>. (л/счет:&nbsp;<strong>10930007932</strong>) - 307,57</span>
                    <?php if ($pay6 > 0): ?>
                      <input type="number" name="pay6" class="form-control input-right" id="pay6" placeholder="" step="0.01" value="<?= $pay6; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon6" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon6"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay6" class="form-control input-right" id="pay6" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon6">Оплата</button>
                      <span class="input-group-text" id="basic-addon6"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Электроэнергия" hidden>
                    <input type="text" name="payment" id="payment" value="pay7" hidden>
                    <span class="input-group-text">Электроэнергия – Получатель:&nbsp;<strong>ПАО «Самараэнерго»</strong>, ИНН:&nbsp;<strong>6315222985</strong>. (л/счет:&nbsp;<strong>050900691990</strong>)</span>
                    <?php if ($pay7 > 0): ?>
                      <input type="number" name="pay7" class="form-control input-right" id="pay7" placeholder="" step="0.01" value="<?= $pay7; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon7" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon7"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay7" class="form-control input-right" id="pay7" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon7">Оплата</button>
                      <span class="input-group-text" id="basic-addon7"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Интернет" hidden>
                    <input type="text" name="payment" id="payment" value="pay8" hidden>
                    <span class="input-group-text">Интернет – Получатель:&nbsp;<a href="https://lk.rt.ru/?utm_source=invoice&utm_medium=email&utm_campaign=lk.rt&utm_content=vl_01" target="_blank"><strong>ПАО «Ростелеком»</strong></a>, Логин: deryabino@gmail.com. Пароль: BigOleksha2017. (карточка 5336690230286306)</span>
                    <?php if ($pay8 > 0): ?>
                      <input type="number" name="pay8" class="form-control input-right" id="pay8" placeholder="" step="0.01" value="<?= $pay8; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon8" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon8"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay8" class="form-control input-right" id="pay8" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon8">Оплата</button>
                      <span class="input-group-text" id="basic-addon8"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="ЖКХ" hidden>
                    <input type="text" name="type" id="type" value="Домофон" hidden>
                    <input type="text" name="payment" id="payment" value="pay9" hidden>
                    <span class="input-group-text">Домофон – Получатель:&nbsp;<a href="https://cyfral-group.ru" target="_blank"><strong>ООО «Цифрал-Автоград»</strong></a>, ИНН:&nbsp;<strong>6321181007</strong>. (л/счет:&nbsp;<strong>048627</strong>)</span>
                    <?php if ($pay9 > 0): ?>
                      <input type="number" name="pay9" class="form-control input-right" id="pay9" placeholder="" step="0.01" value="<?= $pay9; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon9" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon9"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay9" class="form-control input-right" id="pay9" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon9">Оплата</button>
                      <span class="input-group-text" id="basic-addon9"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li>
              <p>Сохраняем квитанции и чеки об оплате в хранилище (необходимо сделать)</p>
            </li>
          </ol> http://cab.tltdgkh.com/site/login Логин: 7022145. Пароль: 42306500. Или с сайта ikvp.ru



          Запоминаем суммы платежей:
          •	Содержание - ООО «ДЖКХ» - 2231,41
          •	Холодная вода – ООО «Волжские коммунальные системы» - 385,73
          •	Тепловая энергия – ПАО «Т-Плюс» - 2290,08
          •	Капитальный ремонт – 593,97
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <ol class="mt-3">
            <li>
              <p>Скачиваем квитанцию с сайта <a href="https://ikvp.ru" target="_blank">ООО «Время перемен»</a>. Логин 70527702167. Пароль 61950.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию с сайта <a href="https://ikvp.ru" target="_blank">ООО «Волжские коммунальные системы»</a>. Логин 63214423645. Пароль 42135.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию на отопление с <a href="https://lk.kvp24.ru/login" target="_blank">сайта</a>. Логин: 30138030185. пароль: 2XFWD4H.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию с сайта <a href="https://мойгаз.смородина.онлайн/login" target="_blank">Смородина</a>. Логин 63107022145. Пароль 42306500.</p>
              <p>логин: deryabino@gmail.com.  пароль: Big@Oleksha@07051967.</p>
              <p>Для Смородины - Лицевой счет: 163034021536. пароль: 3uEz6RM2.</p>
            </li>
            <li>
              <p>Скачиваем квитанцию с <a href="https://lk.samaraenergo.ru/" target="_blank">сайта</a>. Лицевой счет: 050900300580. Пароль: 117686.</p>
            </li>
            <li>
              <p>Оплачиваем через <a href="https://online.sberbank.ru/CSAFront/index.do?login=w9663331189" target="_blank">Сбербанк-Онлайн</a>. Логин: w9663331189. Пароль: 99GJAIPU.</p>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Содержание" hidden>
                    <input type="text" name="payment" id="payment" value="pay11" hidden>
                    <span class="input-group-text">Cодержание – Получатель:&nbsp;<strong>ООО «РКЦ УК-3»</strong>, ИНН:&nbsp;<strong>6324011758</strong>. (л/счет:&nbsp;<strong>63507702167</strong>)</span>
                    <?php if ($pay11 > 0): ?>
                      <input type="number" name="pay11" class="form-control input-right" id="pay11" placeholder="" step="0.01" value="<?= $pay11; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon11" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon11"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay11" class="form-control input-right" id="pay11" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon11">Оплата</button>
                      <span class="input-group-text" id="basic-addon11"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Капремонт" hidden>
                    <input type="text" name="payment" id="payment" value="pay12" hidden>
                    <span class="input-group-text">Капремонт – Получатель:&nbsp;<strong>НКО «ФКР»</strong>, ИНН:&nbsp;<strong>7720367661</strong>. (идентификатор плательщика:&nbsp;<strong>500019802104803</strong>) – 340,56</span>
                    <?php if ($pay12 > 0): ?>
                      <input type="number" name="pay12" class="form-control input-right" id="pay12" placeholder="" step="0.01" value="<?= $pay12; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon12" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon12"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay12" class="form-control input-right" id="pay12" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon12">Оплата</button>
                      <span class="input-group-text" id="basic-addon12"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Вода" hidden>
                    <input type="text" name="payment" id="payment" value="pay13" hidden>
                    <span class="input-group-text">Вода – Получатель:&nbsp;<strong>НКО «Волжские коммунальные системы»</strong>, ИНН:&nbsp;<strong>6312101799</strong>. (Лицевой счет:&nbsp;<strong>63214423645</strong>) Пароль 42135.</span>
                    <?php if ($pay13 > 0): ?>
                      <input type="number" name="pay13" class="form-control input-right" id="pay13" placeholder="" step="0.01" value="<?= $pay13; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon13" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon13"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay13" class="form-control input-right" id="pay13" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon13">Оплата</button>
                      <span class="input-group-text" id="basic-addon12"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Отопление" hidden>
                    <input type="text" name="payment" id="payment" value="pay14" hidden>
                    <span class="input-group-text">Отопление – Получатель:&nbsp;<strong>«Квартплата 24»</strong>, АО «АЛЬФА-БАНК», ИНН:&nbsp;<strong>7728168971</strong>. (л/счет:&nbsp;<strong>30138030185</strong>) (с комиссией 1%)</span>
                    <?php if ($pay14 > 0): ?>
                      <input type="number" name="pay14" class="form-control input-right" id="pay14" placeholder="" step="0.01" value="<?= $pay14; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon14" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon14"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay14" class="form-control input-right" id="pay14" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon14">Оплата</button>
                      <span class="input-group-text" id="basic-addon14"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Газ" hidden>
                    <input type="text" name="payment" id="payment" value="pay15" hidden>
                    <span class="input-group-text">Газ – Получатель:&nbsp;<strong>ООО «Газпром межрегионгаз Самара»</strong>, ИНН:&nbsp;<strong>6310000026</strong>. (л/счет:&nbsp;<strong>163034021536</strong>) </span>
                    <?php if ($pay15 > 0): ?>
                      <input type="number" name="pay15" class="form-control input-right" id="pay15" placeholder="" step="0.01" value="<?= $pay15; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon15" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon15"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay15" class="form-control input-right" id="pay15" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon15">Оплата</button>
                      <span class="input-group-text" id="basic-addon15"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="ГазТО" hidden>
                    <input type="text" name="payment" id="payment" value="pay16" hidden>
                    <span class="input-group-text">ГазТО – Получатель:&nbsp;<strong>ООО «СВГК»</strong>, ИНН:&nbsp;<strong>6314012801</strong>. (л/счет:&nbsp;<strong>32-653923</strong>) </span>
                    <?php if ($pay16 > 0): ?>
                      <input type="number" name="pay16" class="form-control input-right" id="pay16" placeholder="" step="0.01" value="<?= $pay16; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon16" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon16"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay16" class="form-control input-right" id="pay16" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon16">Оплата</button>
                      <span class="input-group-text" id="basic-addon16"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="ТКО" hidden>
                    <input type="text" name="payment" id="payment" value="pay17" hidden>
                    <span class="input-group-text">Вывоз ТКО – Получатель:&nbsp;<strong>ООО «ЭкоСтройРесурс»</strong>, ИНН:&nbsp;<strong>6316186232</strong>. (л/счет:&nbsp;<strong>10930136471</strong>) - 202,85</span>
                    <?php if ($pay17 > 0): ?>
                      <input type="number" name="pay17" class="form-control input-right" id="pay17" placeholder="" step="0.01" value="<?= $pay17; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon17" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon17"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay17" class="form-control input-right" id="pay17" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon16">Оплата</button>
                      <span class="input-group-text" id="basic-addon16"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Электроэнергия" hidden>
                    <input type="text" name="payment" id="payment" value="pay18" hidden>
                    <span class="input-group-text">Электроэнергия – Получатель:&nbsp;<strong>ПАО «Самараэнерго»</strong>, ИНН:&nbsp;<strong>6315222985</strong>. (л/счет:&nbsp;<strong>050900300580</strong>)</span>
                    <?php if ($pay18 > 0): ?>
                      <input type="number" name="pay18" class="form-control input-right" id="pay18" placeholder="" step="0.01" value="<?= $pay18; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon18" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon18"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay18" class="form-control input-right" id="pay18" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon18">Оплата</button>
                      <span class="input-group-text" id="basic-addon18"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li class="mb-2">
              <form action="main/payment">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="name" id="name" value="УК" hidden>
                    <input type="text" name="type" id="type" value="Домофон" hidden>
                    <input type="text" name="payment" id="payment" value="pay19" hidden>
                    <span class="input-group-text">Домофон – Получатель:&nbsp;<a href="https://cyfral-group.ru" target="_blank"><strong>ООО «Цифрал-Автоград»</strong></a>, ИНН:&nbsp;<strong>6321181007</strong>. (л/счет:&nbsp;<strong>200508</strong>)</span>
                    <?php if ($pay19 > 0): ?>
                      <input type="number" name="pay19" class="form-control input-right" id="pay19" placeholder="" step="0.01" value="<?= $pay19; ?>" disabled>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon19" disabled>Оплата</button>
                      <span class="input-group-text" id="basic-addon19"><img src="img/ok.svg" width="20" height="20" alt=""></span>
                    <?php else: ?>
                      <input type="number" name="pay19" class="form-control input-right" id="pay19" placeholder="" step="0.01" required>
                      <span class="input-group-text">₽</span>
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon19">Оплата</button>
                      <span class="input-group-text" id="basic-addon19"><img src="img/no.svg" width="20" height="20" alt=""></span>
                    <?php endif; ?>
                  </div>
                </div>
              </form>
            </li>
            <li>
              <p>Сохраняем квитанции и чеки об оплате в хранилище (необходимо сделать)</p>
            </li>
          </ol>

          Запоминаем суммы платежей:
          •	Содержание - ООО «ТЭМ» - 0,00
          •	Содержание - ООО «Время перемен» - 1010,41
          •	Капитальный ремонт – 340,56




        </div>
      </div>
    </div>

  </div>
</main>
