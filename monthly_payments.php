<div id="calculator-box">
    <script src="<?php echo plugins_url('mesecne_uplate.js', __FILE__); ?>" type="module"></script>

        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputIznosUplateClanaMes">Your monthly payment (RSD)</label>
                        </div>
                        <div class="form-inner-part left">

                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes1" class="button-minus" data-quantity="minus"
                                            data-field="rangeIznosUplateClanaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplateClanaMes" id="specialIdrangeIznosUplateClanaMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeIznosUplateClanaMes"
                                           name="rangeIznosUplateClanaMes"
                                           min="500"
                                           max="100000" value="5000"
                                           step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes1" class="button-plus" data-quantity="plus"
                                            data-field="rangeIznosUplateClanaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5000" type="text" id="inputIznosUplateClanaMes" min="200"
                                           name="rangeIznosUplateClanaMes"
                                           max="30000" value="5000"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-title-inner">
                            <label for="inputIznosUplatePoslodavcaMes">Amount of employer's monthly payment (RSD)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes2" class="button-minus" data-quantity="minus"
                                            data-field="rangeIznosUplatePoslodavcaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplatePoslodavcaMes"></output>
                                    <input class="range input-group-field" type="range"
                                           id="rangeIznosUplatePoslodavcaMes"
                                           name="rangeIznosUplatePoslodavcaMes"
                                           min="0" max="100000"
                                           value="0" step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes2" class="button-plus" data-quantity="plus"
                                            data-field="rangeIznosUplatePoslodavcaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="0" type="text" id="inputIznosUplatePoslodavcaMes" min="200"
                                           max="30000" name="rangeIznosUplatePoslodavcaMes"
                                           value="0"/>
                                </div>
                            </div>

                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: Optional, if your employer also contributes">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPocetkaUplateMes">Your age at the start of payments </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes3" class="button-minus" data-quantity="minus"
                                            data-field="rangeGodinaPocetkaUplateMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPocetkaUplateMes"></output>
                                    <input class="range" type="range" id="rangeGodinaPocetkaUplateMes"
                                           name="rangeGodinaPocetkaUplateMes" min="0"
                                           max="69" value="30"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes3" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPocetkaUplateMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="30" type="text" name="rangeGodinaPocetkaUplateMes"
                                           id="inputGodinaPocetkaUplateMes" min="0"
                                           max="69" value="30"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPovlacenjeMes">At what age do you want to start withdrawing funds? </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes4" class="button-minus" data-quantity="minus"
                                            data-field="rangeGodinaPovlacenjeMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPovlacenjeMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPovlacenjeMes"
                                           name="rangeGodinaPovlacenjeMes"
                                           min="58"
                                           max="70" value="60"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes4" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPovlacenjeMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="60" name="rangeGodinaPovlacenjeMes" type="text"
                                           id="inputGodinaPovlacenjeMes" min="58"
                                           max="70" value="60"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: You can start withdrawing funds as early as 58 years old, and no later than 70 years old.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                         alt=""></p>
                            </div>

                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaMes">Return </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes5" class="button-minus" data-quantity="minus"
                                            data-field="rangeStopaPrinosaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeStopaPrinosaMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeStopaPrinosaMes"
                                           name="rangeStopaPrinosaMes"
                                           min="0"
                                           max="10"
                                           value="5" step="0.01">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes5" class="button-plus" data-quantity="plus"
                                            data-field="rangeStopaPrinosaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5" name="rangeStopaPrinosaMes" type="text"
                                           id="inputStopaPrinosaMes"
                                           min="0" max="10" value="5.00%"/>
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
                            <label for="inputPeriodIsplateGodinamaMes">How long do you want your private pension to be paid? (in years) </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes6" class="button-minus" data-quantity="minus"
                                            data-field="rangePeriodIsplateGodinamaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangePeriodIsplateGodinamaMes"></output>
                                    <input class="range input-group-field" type="range"
                                           id="rangePeriodIsplateGodinamaMes"
                                           name="rangePeriodIsplateGodinamaMes"
                                           min="1" max="30"
                                           value="10"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes6" class="button-plus" data-quantity="plus"
                                            data-field="rangePeriodIsplateGodinamaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="10" name="rangePeriodIsplateGodinamaMes" type="text"
                                           id="inputPeriodIsplateGodinamaMes" min="2" max="30"
                                           value="10"/>
                                </div>
                            </div>

                        </div>
                        <div class="calculator-description">
                            <p class="vrednosti">The values in the calculator are displayed with all fees already included!</p>
                            <ul>
                                <li>
                                    <p>You can contribute for yourself or for others</p>
                                </li>
                                <li>
                                    <p>You can also contribute for minors</p>
                                </li>
                                <li>
                                    <p>Past returns do not guarantee future results. Future returns may be higher or lower than previously achieved.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-inner">
                        <div class="akumulacija-top">
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaSumaMes">Accumulated amount </label>
                                <div>
                                    <input type="text" id="inputAkumuliranaSumaMes"/>
                                </div>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Total amount in your account, sum of contributions and earnings">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoMes">Withdrawal amount (monthly) </label>
                                <div>
                                    <input type="text" id="inputIznosIsplateMesecnoMes"/>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaMes">Total amount of paid funds </label>
                                <div>
                                    <input type="text" id="inputUkupanIznosIsplacenihSredstavaMes"/>
                                </div>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>ADDITIONAL INFORMATION</p>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUlaznaNaknadaClanaMes">Entry fee for member contribution </label>
                                <input readonly type="text" id="inputUlaznaNaknadaClanaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUlaznaNaknadaPoslodavcaMes">Entry fee for employer contribution </label>
                                <input readonly type="text" id="inputUlaznaNaknadaPoslodavcaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex" style="display: none;">
                                <label for="inputPeriodAkumulacijeMes">Accumulation period (in years) </label>
                                <input type="text" id="inputPeriodAkumulacijeMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex" >
                                <label for="inputUkupnoUplacenoClanaMes">Total contributed by the member </label>
                                <input readonly type="text" id="inputUkupnoUplacenoClanaMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Sum of your contributions">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUkupnoUplacenoPoslodavcaMes">Total contributed by the employer </label>
                                <input readonly type="text" id="inputUkupnoUplacenoPoslodavcaMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Sum of employer contributions">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputAkumuliranaSumaClanaMes">Accumulated amount (for member contributions) </label>
                                <input type="text" id="inputAkumuliranaSumaClanaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputAkumuliranaSumaPoslodavcaMes">Accumulated amount (for employer contributions) </label>
                                <input type="text" id="inputAkumuliranaSumaPoslodavcaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputZaradjenoMes">Earned </label>
                                <input readonly type="text" id="inputZaradjenoMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: earned amount from returns">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-description right-box">
                        <p><span>*</span>The calculation is for informational purposes, past returns do not guarantee future results. Future returns may be higher or lower than earlier ones.</p>
                        <p><span>*</span>Withdrawal of funds may begin no earlier than 58 years of age and no later than 70 years of age.</p>
                    </div>
                     <div class="btn-wrap">
                        <button type="button" id="btnMesecno">UPDATE GRAPH</button>
                    </div>
                    <div class="pie-wrap">
                        <div class="pie-inner" id="chartContainer"></div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
