  <!-- Contact form -->
  <div class="contact-form block-margin">
    <div class="container">
      <div class="f-row">
        <div class="f-col-lg-6">
          <div class="m-b-30 m-md-b-50">
            <div class="cf-title title-2 text-center m-b-10"><?=Yii::$app->settings->get('SiteSettings', 'messagesTitle')?></div>
            <div class="cf-text"><?=Yii::$app->settings->get('SiteSettings', 'messagesText')?></div>
          </div>
          <form class="no-labels">
            <div class="f-row">
              <div class="f-col-md-6">
                <div class="form-group">
                  <label class="control-label" for="cf-name-id">Ваше имя</label>
                  <input type="text" name="name" id="cf-name-id" class="form-control" placeholder="Ваше имя">
                </div>
              </div>
              <div class="f-col-md-6">
                <div class="form-group">
                  <label class="control-label" for="cf-phone-id">Ваш телефон</label>
                  <input type="text" name="phone" id="cf-phone-id" class="form-control" placeholder="+7 (___) ___-__-__">
                </div>
              </div>
              <div class="f-col-12">
                <div class="form-group">
                  <label class="control-label" for="cf-message-id">Ваше сообщение</label>
                  <textarea name="message" id="cf-message-id" class="form-control" placeholder="Ваше сообщение"></textarea>
                </div>
              </div>
              <div class="f-col-sm-8">
                <div class="form-group m-sm-b-0">
                  <div class="custom-checkbox d-flex w-100 m-sm-t-10">
                    <input type="checkbox" name="agreement" id="cf-agreement" tabindex="0">
                    <label class="box-label form-note" for="cf-agreement">
                      Нажимая кнопку «Оставить заявку», Вы принимаете условия <object><a href="#">политики конфиденциальности</a></object>
                    </label>
                  </div>
                </div>
              </div>
              <div class="f-col-sm-4">
                <div class="form-group m-b-0">
                  <button type="submit" class="btn btn-lg btn-primary submit-btn w-100 p-x-20">Оставить заявку</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="f-col-lg-6 m-t-20 m-sm-t-30 m-lg-t-0">
          <div class="cf-img bg-img-cover" style="background-image: url(<?=Yii::$app->settings->get('SiteSettings', 'messagesLogo')?>"></div>
        </div>
      </div>
    </div>
  </div>