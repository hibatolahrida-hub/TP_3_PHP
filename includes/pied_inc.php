<footer>
        <p>&copy; 2026 - <?php echo ETABLISSEMENT; ?> - Tous droits réservés.</p>
        <p>Date du jour : <?php echo date("d/m/Y"); ?></p>
        <?php
        $aujourdhui = new DateTime();
        $fin_semestre = new DateTime('2027-01-01');
        $intervalle = $aujourdhui->diff($fin_semestre);
        echo "<p>Jours restants avant la fin du semestre : " . $intervalle->format('%a jours') . "</p>";
        ?>
    </footer>
</body>
</html>