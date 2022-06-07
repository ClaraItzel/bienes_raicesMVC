describe('probando navegacion del header y footer',()=>{
    it('Probando navegación de header',()=>{
        cy.visit('/');
        cy.get('[data-cy="nav-header"]').should('exist');
        cy.get('[data-cy="nav-header"]').find('a').should('have.length',4);
        cy.get('[data-cy="nav-header"]').find('a').should('not.have.length',3);

        //Revisando enlaces
        cy.get('[data-cy="nav-header"]').find('a').eq(0).invoke('attr','href').should('equal','nosotros');
        cy.get('[data-cy="nav-header"]').find('a').eq(0).invoke('text').should('equal','Nosotros');
        cy.get('[data-cy="nav-header"]').find('a').eq(1).invoke('attr','href').should('equal','anuncios');
        cy.get('[data-cy="nav-header"]').find('a').eq(1).invoke('text').should('equal','Anuncios');
        cy.get('[data-cy="nav-header"]').find('a').eq(2).invoke('attr','href').should('equal','blog');
        cy.get('[data-cy="nav-header"]').find('a').eq(2).invoke('text').should('equal','Blog');
        cy.get('[data-cy="nav-header"]').find('a').eq(3).invoke('attr','href').should('equal','contacto');
        cy.get('[data-cy="nav-header"]').find('a').eq(3).invoke('text').should('equal','Contacto');
    });
    it('Probando navegación de footer',()=>{
        cy.visit('/');
        cy.get('[data-cy="nav-footer"]').should('exist');
        cy.get('[data-cy="nav-footer"]').find('a').should('have.length',4);
        cy.get('[data-cy="nav-footer"]').find('a').should('not.have.length',3);
        cy.get('[data-cy="nav-footer"]').find('a').eq(0).invoke('attr','href').should('equal','nosotros');
        cy.get('[data-cy="nav-footer"]').find('a').eq(0).invoke('text').should('equal','Nosotros');
        cy.get('[data-cy="nav-footer"]').find('a').eq(1).invoke('attr','href').should('equal','anuncios');
        cy.get('[data-cy="nav-footer"]').find('a').eq(1).invoke('text').should('equal','Anuncios');
        cy.get('[data-cy="nav-footer"]').find('a').eq(2).invoke('attr','href').should('equal','blog');
        cy.get('[data-cy="nav-footer"]').find('a').eq(2).invoke('text').should('equal','Blog');
        cy.get('[data-cy="nav-footer"]').find('a').eq(3).invoke('attr','href').should('equal','contacto');
        cy.get('[data-cy="nav-footer"]').find('a').eq(3).invoke('text').should('equal','Contacto');
    });
})