/// <reference types="cypress" />
describe('Probando autenticacion',()=>{
    it('Prueba Autenticación en el login',()=>{
        cy.visit('/login');
        cy.get('[data-cy="header-login"]').should('exist');
        cy.get('[data-cy="header-login"]').should('have.text','Iniciar sesión');
        cy.get('[data-cy="form-login"]').should('exist');

        //Ambos campos obligatorios
        cy.get('[data-cy="form-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text','El email es obligatorio');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text','El password es obligatorio');
    });
});