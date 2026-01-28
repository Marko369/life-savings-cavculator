<div id="calculator-box">
    <script src="<?php echo plugins_url('uplata_postojeci_klijenti.js', __FILE__); ?>" type="module"></script>
    <div class="calculator-container">
        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputTrenutnoStanjeKli">Your current account balance (RSD)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor1" class="button-minus" data-quantity="minus" data-field="rangeTrenutnoStanjeKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeTrenutnoStanjeKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeTrenutnoStanjeKli" name="rangeTrenutnoStanjeKli" min="0" max="1500000" value="250000"
                                           step="5000">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor1" class="button-plus" data-quantity="plus" data-field="rangeTrenutnoStanjeKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="250000" name="rangeTrenutnoStanjeKli" type="text" id="inputTrenutnoStanjeKli" min="0" max="1500000" value="250,000"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: You can see your balance in the MY ACCOUNT section">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputIznosUplateMesKli">Your monthly payment (RSD)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor2" class="button-minus" data-quantity="minus" data-field="rangeIznosUplateMesKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplateMesKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeIznosUplateMesKli" name="rangeIznosUplateMesKli" min="500" max="100000" value="5000"
                                           step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor2" class="button-plus" data-quantity="plus" data-field="rangeIznosUplateMesKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5000" name="rangeIznosUplateMesKli" type="text" id="inputIznosUplateMesKli" min="0" max="30000" value="5,000"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPocetkaUplateKli">Your age at the start of payments</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor3" class="button-minus" data-quantity="minus" data-field="rangeGodinaPocetkaUplateKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPocetkaUplateKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPocetkaUplateKli" name="rangeGodinaPocetkaUplateKli" min="0" max="69" value="45"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor3" class="button-plus" data-quantity="plus" data-field="rangeGodinaPocetkaUplateKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="45" name="rangeGodinaPocetkaUplateKli" type="text" id="inputGodinaPocetkaUplateKli" min="0" max="69" value="45"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPovlacenjeKli">At what age do you want to start withdrawing funds?</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor4" class="button-minus" data-quantity="minus" data-field="rangeGodinaPovlacenjeKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPovlacenjeKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPovlacenjeKli" name="rangeGodinaPovlacenjeKli" min="58" max="70" value="65"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor4" class="button-plus" data-quantity="plus" data-field="rangeGodinaPovlacenjeKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="65" name="rangeGodinaPovlacenjeKli" type="text" id="inputGodinaPovlacenjeKli" min="58" max="70" value="65"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: You can start withdrawing funds as early as 58 years old, and no later than 70 years old.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaKli">Return</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor5" class="button-minus" data-quantity="minus" data-field="rangeStopaPrinosaKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeStopaPrinosaKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeStopaPrinosaKli" name="rangeStopaPrinosaKli" min="0" max="10" value="5" step="0.01">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor5" class="button-plus" data-quantity="plus" data-field="rangeStopaPrinosaKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5" type="text" name="rangeStopaPrinosaKli" id="inputStopaPrinosaKli" min="0" max="10" value="5.00%"/>
                                </div>
                            </div>
                            <div class="info-wrap info-fix">
                              <div class="info-icon">
<div class="elementor-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M21.6667 10.8333C21.6667 16.8164 16.8164 21.6667 10.8333 21.6667C4.85025 21.6667 0 16.8164 0 10.8333C0 4.85025 4.85025 0 10.8333 0C16.8164 0 21.6667 4.85025 21.6667 10.8333ZM10.8333 17.0625C11.282 17.0625 11.6458 16.6987 11.6458 16.25V9.75C11.6458 9.30128 11.282 8.9375 10.8333 8.9375C10.3846 8.9375 10.0208 9.30128 10.0208 9.75V16.25C10.0208 16.6987 10.3846 17.0625 10.8333 17.0625ZM10.8333 5.41667C11.4317 5.41667 11.9167 5.9017 11.9167 6.5C11.9167 7.0983 11.4317 7.58333 10.8333 7.58333C10.235 7.58333 9.75 7.0983 9.75 6.5C9.75 5.9017 10.235 5.41667 10.8333 5.41667Z" fill="#E02726"></path></svg></div>
</div>
<div class="info-box"><p>INFO: <?php echo do_shortcode( '[elementor-template id="3444"]' ); ?></p></div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputPeriodIsplateGodinamaKli">How long do you want to receive your private pension? (in years)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor6" class="button-minus" data-quantity="minus" data-field="rangePeriodIsplateGodinamaKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangePeriodIsplateGodinamaKli"></output>
                                    <input class="range input-group-field" type="range" id="rangePeriodIsplateGodinamaKli" name="rangePeriodIsplateGodinamaKli" min="1" max="30" value="10"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor6" class="button-plus" data-quantity="plus" data-field="rangePeriodIsplateGodinamaKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="10" name="rangePeriodIsplateGodinamaKli" type="text" id="inputPeriodIsplateGodinamaKli" min="2" max="30" value="10"/>
                                </div>
                            </div>
                        </div>

                        <div class="calculator-description">
                            <p class="vrednosti">The values in the calculator are shown with all fees already included!</p>
                            <ul>
                                <li>
                                    <p>You can pay for yourself or for others</p>
                                </li>
                                <li>
                                    <p>You can also pay for minors</p>
                                </li>
                                <li>
                                    <p>Past returns do not guarantee future results. Future returns may be higher or lower than past returns.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-inner">
                        <div class="akumulacija-top">
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaSumaKli">Accumulated amount </label>
                                <input type="text" id="inputAkumuliranaSumaKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: The total amount in your account, sum of payments and earnings">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoKli">Amount of payment (monthly)</label>
                                <input type="text" id="inputIznosIsplateMesecnoKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaKli">Total amount of paid funds</label>
                                <input type="text" id="inputUkupanIznosIsplacenihSredstavaKli"/>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>ADDITIONAL INFORMATION</p>
                            <div class="form-inner-part right">
                                <label for="inputUlaznaNaknadaKli">Entrance fee </label>
                                <input readonly type="text" id="inputUlaznaNaknadaKli"/>
                            </div>
                            <div class="form-inner-part right" style="display:none">
                                <label for="inputPeriodAkumulacijeKli">Accumulation period</label>
                                <input type="text" id="inputPeriodAkumulacijeKli"/>
                            </div>
                            <div class="form-inner-part right" >
                                <label for="inputUkupnoUplacenoKli">Total paid</label>
                                <input readonly type="text" id="inputUkupnoUplacenoKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: The sum of your payments">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaTrenutnoKli">Accumulated amount for current balance</label>
                                <input readonly type="text" id="inputAkumuliranaTrenutnoKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaMesKli">Accumulated amount for monthly payments</label>
                                <input readonly type="text" id="inputAkumuliranaMesKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputZaradjenoKli">Earned</label>
                                <input readonly type="text" id="inputZaradjenoKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: earned amount from returns">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-description right-box">
                        <p><span>*</span>The calculation is for informational purposes; past returns do not guarantee future results. Future returns may be higher or lower than previous ones.
                        </p>
                        <p><span>*</span>Withdrawal of funds can begin as early as 58 years of age and no later than 70 years of age.</p>
                    </div>
                    <div class="btn-wrap">
                <button type="button" id="btnKli">UPDATE CHART</button>
            </div>
            <div class="pie-wrap">
                <div class="pie-inner" id="chartContainerUplataPostojeci"></div>
            </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
