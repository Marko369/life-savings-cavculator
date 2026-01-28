<?php
/* Calculator main file*/
/**
 * Plugin Name: Calculator Plugin
 * Description: A multi-tab calculator for payments.
 * Version: 2.0.2
 * Author: New Look
 * Author URI: 
 * Developer: Marko Markovic
 */

namespace WPTurbo\Calculator;

defined( 'ABSPATH' ) || exit;

class Calculator {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
        add_shortcode( 'calculator', [$this, 'render_calculator'] );
        add_shortcode( 'calculator-eng', [$this, 'render_calculator_eng'] );
    }

    public function enqueue_scripts() {
        wp_enqueue_style( 'calculator-style', plugin_dir_url( __FILE__ ) . 'style.css' );
        wp_enqueue_style( 'fancybox-style', plugin_dir_url( __FILE__ ) . 'fancybox/jquery.fancybox.css' );
        wp_enqueue_script( 'calculator-main-script', plugin_dir_url( __FILE__ ) . 'js/calculator-main-script.js', ['jquery'], null, true );
        wp_enqueue_script( 'canvasjs', plugin_dir_url( __FILE__ ) . 'js/canvasjs.min.js', [], null, true );
        wp_enqueue_script( 'fancybox', plugin_dir_url( __FILE__ ) . 'fancybox/jquery.fancybox.min.js', [], null, true );
       // wp_enqueue_script( 'one-time-payment', plugin_dir_url( __FILE__ ) . 'one_time_payment.js', [], null, true );
        // wp_enqueue_script( 'monthly-payments', plugin_dir_url( __FILE__ ) . 'monthly_payments.js', [], null, true );
       // wp_enqueue_script( 'existing-clients-payment', plugin_dir_url( __FILE__ ) . 'existing_clients_payment.js', [], null, true );
    }

    public function render_calculator() {
        ob_start();
        ?>
        <div class="calculator-container">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'MonthlyPayments')" id="defaultOpen">MESEČNE UPLATE</button>
                <button class="tablinks" onclick="openTab(event, 'OneTimePayment')">JEDNOKRATNE UPLATE</button>
                <button class="tablinks" onclick="openTab(event, 'ExistingClients')">UPLATE ZA POSTOJEĆE KLIJENTE</button>
            </div>

            <div id="MonthlyPayments" class="tabcontent" style="display: block;">
                <?php include plugin_dir_path( __FILE__ ) . 'mesecne_uplate.php'; ?>
            </div>

            <div id="OneTimePayment" class="tabcontent" style="display: none;">
                <?php include plugin_dir_path( __FILE__ ) . 'jednokratna_uplata.php'; ?>
            </div>

            <div id="ExistingClients" class="tabcontent" style="display: none;">
                <?php include plugin_dir_path( __FILE__ ) . 'uplata_postojeci_klijenti.php'; ?>
            </div>
        </div>
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Automatically open the default tab when the page loads
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("defaultOpen").click();
            });
        </script>
        <?php
        return ob_get_clean();
    }

    public function render_calculator_eng() {
        ob_start();
        ?>
        <div class="calculator-container">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'MonthlyPaymentsEng')" id="defaultOpenEng">MONTHLY PAYMENTS</button>
                <button class="tablinks" onclick="openTab(event, 'OneTimePaymentEng')">ONE-TIME PAYMENT</button>
                <button class="tablinks" onclick="openTab(event, 'ExistingClientsEng')">EXISTING CLIENTS</button>
            </div>

            <div id="MonthlyPaymentsEng" class="tabcontent" style="display: block;">
                <?php include plugin_dir_path( __FILE__ ) . 'monthly_payments.php'; // Make sure this file has English content ?>
            </div>

            <div id="OneTimePaymentEng" class="tabcontent" style="display: none;">
                <?php include plugin_dir_path( __FILE__ ) . 'one_time_payment.php'; // Make sure this file has English content ?>
            </div>

            <div id="ExistingClientsEng" class="tabcontent" style="display: none;">
                <?php include plugin_dir_path( __FILE__ ) . 'existing_clients_payment.php'; // Make sure this file has English content ?>
            </div>
        </div>
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Automatically open the default tab when the page loads
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("defaultOpenEng").click();
            });
        </script>
        <?php
        return ob_get_clean();
    }
}

new Calculator();
