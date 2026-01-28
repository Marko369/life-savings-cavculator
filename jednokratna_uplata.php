<div id="calculator-box">
    <script src="<?php echo plugins_url('jednokratna_uplata.js', __FILE__); ?>" type="module"></script>

    <div class="calculator-container">
        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputIznosUplateJed">Vaša jednokratna uplata (rsd)</label>
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
                            <label for="inputGodinaPocetkaUplateJed">Vaše godine na početku uplaćivanja</label>
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
                            <label for="inputGodinaPovlacenjeJed">Sa koliko godina želite da počnete da povlačite sredstva?</label>
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
                                   data-tooltip="INFO: Možete da počnete da povlačite sredstva već sa navršenih 58 godina, a najkasnije sa 70 godina.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaJed">Prinos</label>
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
<div class="info-box"><p>INFO: <?php echo do_shortcode( '[elementor-template id="3027"]' ); ?></p></div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputPeriodIsplateGodinamaJed">Koliko dugo želite da Vam se isplaćuje privatna penzija? (u godinama)</label>
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
                            <p class="vrednosti">Vrednosti u kalkulatoru su prikazane sa
                                već uračunatim svim naknadama!</p>
                            <ul>
                                <li>
                                    <p>Možete da uplaćujete za sebe ili za druge</p>
                                </li>
                                <li>
                                    <p>Možete da uplaćujete i za maloletna lica</p>
                                </li>
                                <li>
                                    <p>Prethodno ostvareni prinosi ne predstavljaju garanciju budućih
                                        rezultata. Budući prinosi mogu biti viši ili niži od prethodno
                                        ostvarenih.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-inner">
                        <div class="akumulacija-top">
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaSumaJed">Akumulirana suma </label>
                                <input readonly type="text" id="inputAkumuliranaSumaJed"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Ukupna suma na vašem računu, zbir uplata i zarade">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoJed">Iznos isplate (mesečno) </label>
                                <input readonly type="text" id="inputIznosIsplateMesecnoJed"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaJed">Ukupan iznos isplaćenih
                                    sredstava </label>
                                <input readonly type="text" id="inputUkupanIznosIsplacenihSredstavaJed"/>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>DODATNE INFORMACIJE</p>
                            <div class="form-inner-part right">
                                <label for="inputUlaznaNaknadaJad">Ulazna naknada</label>
                                <input readonly type="text" id="inputUlaznaNaknadaJad"/>
                            </div>
                            <div class="form-inner-part right" style="display: none;">
                                <label for="inputPeriodAkumulacijeJed">Period akumulacije (u godinama) </label>
                                <input readonly="" type="text" id="inputPeriodAkumulacijeJed">
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUplacenoJed">Ukupno uplaćeno </label>
                                <input readonly type="text" id="inputUplacenoJed"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Zbir vaših uplata">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputZaradjenoJed">Zarađeno </label>
                                <input readonly type="text" id="inputZaradjenoJed"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: zarađeni iznos od prinosa">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-description right-box">
                        <p><span>*</span>Kalkulacija je informativnog karaktera, prethodno ostvareni prinosi ne
                            predstavljaju garanciju budućih rezultata. Budući prinosi mogu biti viši ili niži od
                            ranijih.
                        </p>
                        <p><span>*</span>Povlačenje sredstava može početi najranije sa navršenih 58 godina starosti a
                            najkasnije sa navršenih 70 godina</p>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" id="btnJednokratno">AŽURIRAJ GRAFIKON</button>
                    </div>
                    <div class="pie-wrap">
                        <div class="pie-inner" id="chartContainerJednokratna"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
