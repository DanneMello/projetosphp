#include <stdio.h>
#include <stdlib.h>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char *argv[]) {
	
	char nome[2] ;
	float n1[2], n2[2], media[2] ;
	int count, i ;
	
	for(i=0; i <2; i++) {
		printf("Aluno %d posicao\n", i );
		printf("Nome: \n");
			scanf("%s", &nome[i] );
			
		printf("Primeira nota: \n");
			scanf("%f", &n1[i] );
		
		printf("Segunda nota: \n");
			scanf("%f", &n2[i] );
					
		media[i] = (n1[i] + n2[i])  / 2;
	
	}
	
	printf("LISTAGEM DE ALUNOS:");
	printf("\n------------------------------------\n");

	for (i=0; i<2; i++) {
		printf("Nome:%s\n Media: %f\n\n", &nome[i], &media[i]);
	}
	
	
	
	
	return 0;
}
