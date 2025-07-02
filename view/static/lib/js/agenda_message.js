function compartilharAgenda() {
    const tabela = document.querySelector("table");
    const dias = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"];
    const linhas = tabela.querySelectorAll("tbody tr");

    let mensagem = "*Agenda Semanal:*\n\n";

    linhas.forEach((linha, i) => {
        const colunas = linha.querySelectorAll("td");

        colunas.forEach((coluna, j) => {
            const texto = coluna.innerText.trim();
            
            if (texto) {
                const texto_split = texto.split("\n");
                const oficina = texto_split[0] || "";
                const professor = texto_split[1] || "";
                const horario = texto_split[2] || "";

                mensagem += `*${dias[j]}:*\n`;
                mensagem += `• Oficina: ${oficina}\n`;
                mensagem += `• Professor(a): ${professor}\n`;
                mensagem += `• Horário: ${horario}\n\n`;
            }
        });
    });
    const mensagem_encoded = encodeURIComponent(mensagem);
    const link = `https://wa.me/?text=${mensagem_encoded}`;
    window.open(link, '_blank');
}