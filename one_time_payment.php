<div id="calculator-box">
    <script src="<?php echo plugins_url('jednokratna_uplata.js', __FILE__); ?>" type="module"></script>

    <div class="calculator-container">
        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputIznosUplateJed">Your one-time payment (rsd)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusJed1" class="button-minus"
                                            data-quantity="minus"
                                            data-field="rangeIznosUplateJed">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" id="output1" name="rangeIznosUplateJed"></output>
                                    <input class="range input-group-field" type="range" id="rangeIznosUplateJed"
                                           name="rangeIznosUplateJed" min="0"
                                           max="3000000"
                                           value="500000"
                                           step="10000">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusJed1" class="button-plus" data-quantity="plus"
                                            data-field="rangeIznosUplateJed">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value=500000 name="rangeIznosUplateJed" type="text"
                                           id="inputIznosUplateJed" min="0" max="3000000"
                                           value="500.000"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPocetkaUplateJed">Your age at the start of payments</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusJed2" class="button-minus"
                                            data-quantity="minus"
                                            data-field="rangeGodinaPocetkaUplateJed">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" id="output2" name="rangeGodinaPocetkaUplateJed"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPocetkaUplateJed"
                                           name="rangeGodinaPocetkaUplateJed" min="0"
                                           max="69" value="35" step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusJed2" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPocetkaUplateJed">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="35" type="text" name="rangeGodinaPocetkaUplateJed"
                                           id="inputGodinaPocetkaUplateJed" min="0"
                                           max="69" value="35"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPovlacenjeJed">At what age do you want to start withdrawing funds?</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusJed3" class="button-minus"
                                            data-quantity="minus"
                                            data-field="rangeGodinaPovlacenjeJed">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" id="output3" name="rangeGodinaPovlacenjeJed"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPovlacenjeJed"
                                           name="rangeGodinaPovlacenjeJed"
                                           min="58" max="70"
                                           value="65" step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusJed3" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPovlacenjeJed">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="65" name="rangeGodinaPovlacenjeJed" type="text"
                                           id="inputGodinaPovlacenjeJed" min="58" max="70"
                                           value="65"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: You can start withdrawing funds as early as 58 years old and no later than 70 years old.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaJed">Return</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusJed4" class="button-minus"
                                            data-quantity="minus"
                                            data-field="rangeStopaPrinosaJed">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" id="output4" name="rangeStopaPrinosaJed"></output>
                                    <input class="range input-group-field" type="range" id="rangeStopaPrinosaJed"
                                           name="rangeStopaPrinosaJed" min="0.00"
                                           max="10.00" value="5.00"
                                           step="0.01">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusJed4" class="button-plus" data-quantity="plus"
                                            data-field="rangeStopaPrinosaJed">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5" type="text" name="rangeStopaPrinosaJed"
                                           id="inputStopaPrinosaJed" min="0" max="10" value="5%"/>
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
                            <label for="inputPeriodIsplateGodinamaJed">How long do you want your private pension to be paid? (in years)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusJed5" class="button-minus"
                                            data-quantity="minus"
                                            data-field="rangePeriodIsplateGodinamaJed">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" id="output5" name="rangePeriodIsplateGodinamaJed"></output>
                                    <input class="range input-group-field" type="range"
                                           id="rangePeriodIsplateGodinamaJed"
                                           name="rangePeriodIsplateGodinamaJed" min="1"
                                           max="30" value="10" step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusJed5" class="button-plus" data-quantity="plus"
                                            data-field="rangePeriodIsplateGodinamaJed">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="10" type="text"
                                           name="rangePeriodIsplateGodinamaJed"
                                           id="inputPeriodIsplateGodinamaJed" min="2"
                                           max="30" value="10"/>
                                </div>
                            </div>
                        </div>
                        <div class="calculator-description">
                            <p class="vrednosti">Values in the calculator are displayed with all fees already included!</p>
                            <ul>
                                <li>
                                    <p>You can pay for yourself or for others</p>
                                </li>
                                <li>
                                    <p>You can also pay for minors</p>
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
                                <label for="inputAkumuliranaSumaJed">Accumulated amount </label>
                                <input readonly type="text" id="inputAkumuliranaSumaJed"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Total amount in your account, sum of payments and earnings">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoJed">Payment amount (monthly) </label>
                                <input readonly type="text" id="inputIznosIsplateMesecnoJed"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaJed">Total amount of paid funds </label>
                                <input readonly type="text" id="inputUkupanIznosIsplacenihSredstavaJed"/>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>ADDITIONAL INFORMATION</p>
                            <div class="form-inner-part right">
                                <label for="inputUlaznaNaknadaJad">Entry fee</label>
                                <input readonly type="text" id="inputUlaznaNaknadaJad"/>
                            </div>
                            <div class="form-inner-part right" style="display: none;">
                                <label for="inputPeriodAkumulacijeJed">Accumulation period (in years) </label>
                                <input readonly="" type="text" id="inputPeriodAkumulacijeJed">
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUplacenoJed">Total paid </label>
                                <input readonly type="text" id="inputUplacenoJed"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Sum of your payments">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputZaradjenoJed">Earned </label>
                                <input readonly type="text" id="inputZaradjenoJed"/>
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
                        <p><span>*</span>The calculation is for informational purposes, past returns do not guarantee future results. Future returns may be higher or lower than previous ones.</p>
                        <p><span>*</span>Withdrawal of funds can begin no earlier than the age of 58 and no later than the age of 70</p>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" id="btnJednokratno">UPDATE CHART</button>
                    </div>
                    <div class="pie-wrap">
                        <div class="pie-inner" id="chartContainerJednokratna"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
